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

    public function test_devuelve_edit()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
        $categoria = Categoria::first();
        $response = $this->get('/categorias/' . $categoria->id . '/edit');
        $response->assertViewIs('categorias.edit');
    }
}
