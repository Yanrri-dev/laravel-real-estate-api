<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Propiedad;

class PropiedadControllerTest extends TestCase
{

    use RefreshDatabase;


    public function test_create_propiedad()
    {

        $this->withoutMiddleware();

        $response = $this->postJson('/api/propiedades', [
            'direccion' => 'Calle 123',
            'ciudad' => 'Santiago',
            'precio' => 12000.0,
            'descripcion' => 'Casa de dos pisos'
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                    "propiedad" => [
                        'direccion' => 'Calle 123',
                        'ciudad' => 'Santiago',
                        'precio' => 12000.0,
                        'descripcion' => 'Casa de dos pisos'
                    ]
                 ]);

        $this->assertDatabaseHas('propiedades', [
            'direccion' => 'Calle 123',
            'ciudad' => 'Santiago',
            'precio' => 12000,
            'descripcion' => 'Casa de dos pisos'
        ]);
    }

    public function test_read_propiedad()
    {

        $this->withoutMiddleware();

        $propiedad = Propiedad::factory()->create();

        $response = $this->getJson('/api/propiedades/' . $propiedad->id);

        $response->assertStatus(200)
                 ->assertJson([
                    'id' => $propiedad->id,
                    'direccion' => $propiedad->direccion,
                    'ciudad' => $propiedad->ciudad,
                    'precio' => $propiedad->precio,
                    'descripcion' => $propiedad->descripcion

                 ]);
    }

    public function test_update_propiedad()
    {

        $this->withoutMiddleware();

        $propiedad = Propiedad::factory()->create();

        $response = $this->putJson('/api/propiedades/' . $propiedad->id, [
            'direccion' => 'Calle 123 updated',
            'ciudad' => 'Santiago Centro',
            'precio' => 13000.0,
            'descripcion' => 'Departamento de 3 dormitorios'
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                    "propiedad" => [
                        'direccion' => 'Calle 123 updated',
                        'ciudad' => 'Santiago Centro',
                        'precio' => 13000.0,
                        'descripcion' => 'Departamento de 3 dormitorios'
                    ]
                 ]);

        $this->assertDatabaseHas('propiedades', [
            'direccion' => 'Calle 123 updated',
            'ciudad' => 'Santiago Centro',
            'precio' => 13000.0,
            'descripcion' => 'Departamento de 3 dormitorios'
        ]);
    }

    public function test_delete_propiedad()
    {

        $this->withoutMiddleware();

        $propiedad = Propiedad::factory()->create();

        $response = $this->deleteJson('/api/propiedades/' . $propiedad->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('propiedades', [
            'id' => $propiedad->id
        ]);
    }



}
