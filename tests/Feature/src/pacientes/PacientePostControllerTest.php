<?php

declare(strict_types=1);

namespace Tests\Feature\src\pacientes;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use SysGineco\Gineco\Shared\Domain\ValueObjects\Uuid;
use Tests\TestCase;
use Faker\Factory;

final class PacientePostControllerTest extends TestCase
{
    use DatabaseTransactions;

    private $faker;

    protected function setUp(): void
    {
        $this->faker = Factory::create();
        parent::setUp();
    }

    /**
     * @test
     */
    public function it_should_create_new_paciente()
    {
        $user = User::factory()->create();

        $pacienteUuid = Uuid::random()->value();
        $paciente = $this->builderPaciente($pacienteUuid);

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])->post('/pacientes/create', $paciente);

        $response->assertRedirect('/pacientes/listar');
    }

    private function builderPaciente(string $pacienteUuid): array
    {
        return [
            'id' => $pacienteUuid,
            'nombre' => $this->faker->name,
            'apellido' => $this->faker->lastName,
            'lugar_nacimiento' => $this->faker->country,
            'grado_instruccion' => $this->faker->text(20),
            'edad' => $this->faker->randomElement([20,30,50,90,25,18,5]),
            'fecha_nacimiento' => $this->faker->date('d/m/Y'),
            'estado_civil' => $this->faker->randomElement(['soltero', 'casado']),
            'telefono' => $this->faker->phoneNumber,
            'dirrecion' => $this->faker->address,
            'observacion' => $this->faker->text(50),
        ];
    }
}
