<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Persona;

class PersonaControllerTest extends TestCase
{

    use RefreshDatabase;

   public function test_create_persona()
    {

        $this->withoutMiddleware();

        $response = $this->postJson('/api/personas', [
            'nombre' => 'Juan',
            'email' => 'juan@gmail.com',
            'telefono' => '123456789'
        ]);

         // Agregar depuración

        $response->assertStatus(201)
                 ->assertJson([
                    "persona" => [
                        'nombre' => 'Juan',
                        'email' => 'juan@gmail.com',
                        'telefono' => '123456789'
                    ]
                 ]);

        $this->assertDatabaseHas('personas', [
            'nombre' => 'Juan',
            'email' => 'juan@gmail.com',
            'telefono' => '123456789'
        ]);
    }

    public function test_read_persona()
    {

        $this->withoutMiddleware();

        $persona = Persona::factory()->create();

        $response = $this->getJson('/api/personas/' . $persona->id);

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $persona->id,
                     'nombre' => $persona->nombre,
                     'email' => $persona->email,
                     'telefono' => $persona->telefono,
                 ]);
    }

    public function test_update_persona()
    {

        $this->withoutMiddleware();

        $persona = Persona::factory()->create();

        $response = $this->putJson('/api/personas/' . $persona->id, [
            'nombre' => 'Juan Updated',
            'email' => 'juan_updated@gmail.com',
            'telefono' => '987654321',
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                    'persona' => [
                        'id' => $persona->id,
                        'nombre' => 'Juan Updated',
                        'email' => 'juan_updated@gmail.com',
                        'telefono' => '987654321',
                    ]
                 ]);

        $this->assertDatabaseHas('personas', [
            'id' => $persona->id,
            'nombre' => 'Juan Updated',
            'email' => 'juan_updated@gmail.com',
            'telefono' => '987654321',
        ]);
    }

    public function test_delete_persona()
    {

        $this->withoutMiddleware();

        $persona = Persona::factory()->create();

        $response = $this->deleteJson('/api/personas/' . $persona->id);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Persona eliminada']);

        $this->assertDatabaseMissing('personas', [
            'id' => $persona->id
        ]);
    }
}
