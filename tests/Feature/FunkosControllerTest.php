<?php


namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Funko;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class FunkosControllerTest extends TestCase
{
    protected function setUp(): void
    {
        //para que se ejecute la migracion y el seeder en base de datos de prueba y no en la real
        parent::setUp();
        $this->artisan('migrate:fresh'); //poner fresh para que no haya problemas con la migracion y la semilla
        $this->artisan('db:seed'); //para que se ejecute el seeder
    }

    public function test_devuelve_index()
    {
        $response = $this->get('/');
        $response->assertViewIs('funkos.index');
    }

    public function test_devuelve_show()
    {
        $funko = Funko::first();
        $response = $this->get('/funkos/' . $funko->id);
        $response->assertViewIs('funkos.show');
    }

    public function test_devuelve_create()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
        $response = $this->get('/funkos/create');
        $response->assertViewIs('funkos.create');

    }

    public function test_devuelve_edit()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
        $funko = Funko::first();
        $response = $this->get('/funkos/' . $funko->id . '/edit');
        $response->assertViewIs('funkos.edit');
    }

    public function test_devuelve_editImagen()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
        $funko = Funko::first();
        $response = $this->get('/funkos/' . $funko->id . '/image');
        $response->assertViewIs('funkos.editImagen');
    }

    public function test_devuelve_editImagen_no_admin()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $funko = Funko::first();
        $response = $this->get('/funkos/' . $funko->id . '/image');
        $response->assertStatus(302);
        //devuelve al index
        $response->assertRedirect('/home');
    }

    public function test_devuelve_edit_no_admin()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $funko = Funko::first();
        $response = $this->get('/funkos/' . $funko->id . '/edit');
        $response->assertStatus(302);
        //devuelve al index
        $response->assertRedirect('/home');
    }

    public function test_devuelve_create_no_admin()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/funkos/create');
        $response->assertStatus(302);
        //devuelve al index
        $response->assertRedirect('/home');
    }



    public function test_store()
    {
        Storage::fake('funkos');
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
        $categoria = Categoria::first();
        $funko = Funko::factory()->make(['nombre' => 'Superman', 'categoria_id' => $categoria->id]);
        $response = $this->post('/funkos', $funko->toArray());
        $response->assertRedirect('/');
        $this->assertDatabaseHas('funkos', ['nombre' => 'Superman']);
    }


    public function test_update()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
        $funko = Funko::first();
        $funko->nombre = 'Superman';
        $response = $this->put('/funkos/' . $funko->id, $funko->toArray());
        $response->assertRedirect('/');
        $this->assertDatabaseHas('funkos', ['nombre' => 'Superman']);
    }

    public function test_update_no_admin()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $funko = Funko::first();
        $funko->nombre = 'Superman';
        $response = $this->put('/funkos/' . $funko->id, $funko->toArray());
        $response->assertStatus(302);
        //devuelve al index
        $response->assertRedirect('/home');
    }

    public function test_updateImagen()
    {
        Storage::fake('funkos');
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
        $funko = Funko::first();
        $file = UploadedFile::fake()->image('avatar.jpg');
        $response = $this->patch('/funkos/' . $funko->id . '/image', ['imagen' => $file]);
        $response->assertRedirect('/funkos');
        $this->assertFileDoesNotExist(storage_path('app/public/funkos/' . $file->hashName()));
    }


}
