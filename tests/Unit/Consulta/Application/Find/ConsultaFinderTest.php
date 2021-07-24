<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Application\Find;

use PHPUnit\Framework\MockObject\MockObject;
use SysGineco\Gineco\Consultas\Application\Find\ConsultaFinder;
use SysGineco\Gineco\Consultas\Domain\Contracts\ConsultaRepository;
use SysGineco\Gineco\Consultas\Domain\Exceptions\ConsultaNotExistsException;
use Tests\TestCase;
use Tests\Unit\Consulta\Domain\ConsultaMother;

final class ConsultaFinderTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_find_an_existing_consulta()
    {
        $consulta = ConsultaMother::random();

        $repository = $this->createMock(ConsultaRepository::class);
        $this->shouldFind($repository, $consulta);

        $request = ConsultaFinderRequestMother::create($consulta->id()->value());
        $response = (new ConsultaFinder($repository))->__invoke($request);

        $this->assertEquals($response, $consulta);
    }

    /**
     * @test
     */
    public function it_should_not_find_an_existing_consulta()
    {
        $repository = $this->createMock(ConsultaRepository::class);
        $this->shouldNotFind($repository);

        $request = ConsultaFinderRequestMother::random();

        $this->expectException(ConsultaNotExistsException::class);

        (new ConsultaFinder($repository))->__invoke($request);
    }

    private function shouldFind(MockObject $repository, \SysGineco\Gineco\Consultas\Domain\Consulta $consulta): void
    {
        $repository->method('find')
            ->with($this->equalTo($consulta->id()))
            ->willReturn($consulta);
    }

    private function shouldNotFind(MockObject $repository)
    {
        $repository->method('find')
            ->willReturn(null);
    }
}
