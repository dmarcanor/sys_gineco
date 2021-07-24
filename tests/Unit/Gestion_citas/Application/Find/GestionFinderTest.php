<?php
declare(strict_types=1);

namespace Tests\Unit\Gestion_citas\Application\Find;

use PHPUnit\Framework\MockObject\MockObject;
use SysGineco\Gineco\Gestion_citas\Application\Find\GestionCitaFinder;
use SysGineco\Gineco\Gestion_citas\Domain\Contracts\GestionCitaRepository;
use SysGineco\Gineco\Gestion_citas\Domain\Exceptions\GestionCitaDoesNotExistException;
use SysGineco\Gineco\Gestion_citas\Domain\GestionCita;
use Tests\TestCase;
use Tests\Unit\Gestion_citas\Domain\GestionCitaMother;

final class GestionFinderTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_find_an_existing_gestion_citas()
    {
     $gestion_cita = GestionCitaMother::random();

     $repository = $this->createMock(GestionCitaRepository::class);
     $this->shouldFind($repository, $gestion_cita);

     $request   = GestionCitaFinderRequestMother::create($gestion_cita->id()->value());
     $response  = (new GestionCitaFinder($repository))->__invoke($request);

     $this->assertEquals($response, $gestion_cita);
    }

    /**
     * @test
     */
    public function it_should_not_find_an_existing_gestion_cita()
    {
        $repository = $this->createMock(GestionCitaRepository::class);
        $this->shouldNotFind($repository);

        $request = GestionCitaFinderRequestMother::random();

        $this->expectException(GestionCitaDoesNotExistException::class);

        (new GestionCitaFinder($repository))->__invoke($request);
    }


    private function shouldFind(MockObject $repository, GestionCita $gestionCita): void
    {
        $repository->method('find')
            ->with($this->equalTo($gestionCita->id()))
            ->willReturn($gestionCita);
    }

    private function shouldNotFind(MockObject $repository): void
    {
        $repository->method('find')
            ->willReturn(null);

    }

}
