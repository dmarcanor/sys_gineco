<?php
declare(strict_types=1);

namespace Tests\Unit\Gestion_citas\Application\Create;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use SysGineco\Gineco\Gestion_citas\Application\Create\GestionCitaCreator;
use SysGineco\Gineco\Gestion_citas\Domain\Contracts\GestionCitaRepository;
use SysGineco\Gineco\Gestion_citas\Domain\GestionCita;
use Tests\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\Unit\Gestion_citas\Domain\GestionCitaMother;


final class GestionCitasCreatorTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_should_create_a_valid_gestion_cita()
    {
        $request            = GestionCitasCreatorRequestMother::random();
        $gestionCita        = GestionCitaMother::fromRequest($request);

        $repository         = $this->createMock(GestionCitaRepository::class);
        $this->shouldSave($repository, $gestionCita);

        $response  = (new GestionCitaCreator($repository))->__invoke($request);

        $this->assertNull($response);
    }

    private function shouldSave(MockObject $repository, GestionCita $gestionCita): void
    {
        $repository->method('create')
            ->with($this->equalTo($gestionCita));
    }
}
