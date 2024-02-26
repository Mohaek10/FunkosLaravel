<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\User;
use Tests\TestCase;

class CategoriasControllerTest extends TestCase
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
        $response = $this->get('/categorias');
        $response->assertViewIs('categorias.index');
    }

    public function test_devuelve_show()
    {
        $categoria = Categoria::first();
        $response = $this->get('/categorias/' . $categoria->id);
        $response->assertViewIs('categorias.show');
    }

    public function test_devuelve_create()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
        $response = $this->get('/categorias/create');
        $response->assertViewIs('categorias.create');
    }

    //Test para crear funkos
    /*
     * public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'min:3|max:100|required',
        ]);
        try {
            //comprobar que el nombre no exista
            $categoria = Categoria::where('nombre', $request->nombre)->first();
            if ($categoria) {
                flash('La categoria ' . $request->nombre . ' ya existe.')->error()->important();
                return redirect()->back();
            }
            $categoria = new Categoria($request->all());
            $categoria->save();
            flash('Categoria ' . $categoria->nombre . ' creada correctamente.')->success()->important();
            return redirect()->route('categorias.index');
        } catch (Exception $e) {
            flash('Error al crear la categoria ' . $e->getMessage())->error()->important();
            return redirect()->back();
        }
    }
     *
     * */
    public function test_crear_categoria()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
        $response = $this->post('/categorias', ['nombre' => 'categoria de prueba']);
        $response->assertRedirect('/categorias');
        $this->assertDatabaseHas('categorias', ['nombre' => 'categoria de prueba']);
    }

    public function test_crear_categoria_no_admin()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/categorias', ['nombre' => 'categoria de prueba']);
        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertDatabaseMissing('categorias', ['nombre' => 'categoria de prueba']);
    }


}
