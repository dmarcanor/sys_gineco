<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Application\Update;

use Medine\ERP\Provider\Domain\Entity\Provider;
use PHPUnit\Framework\MockObject\MockObject;
use SysGineco\Gineco\Consultas\Application\Update\ConsultaUpdater;
use SysGineco\Gineco\Consultas\Domain\Consulta;
use SysGineco\Gineco\Consultas\Domain\Contracts\ConsultaRepository;
use Tests\TestCase;
use Tests\Unit\Consulta\Domain\ConsultaMother;

final class ConsultaUpdaterTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_update_succesfully_a_consulta()
    {
        $consulta = ConsultaMother::random();

        $repository = $this->createMock(ConsultaRepository::class);
        $this->shouldFind($repository, $consulta);
        $this->shouldUpdate($repository, $consulta);

        $request = ConsultaUpdaterRequestMother::withId($consulta->id()->value());
        $response = (new ConsultaUpdater($repository))->__invoke($request);

        $this->assertNull($response);
    }

    public function shouldFind(MockObject $repository, Consulta $consulta): void
    {
        $repository->method('find')
            ->with($this->equalTo($consulta->id()))
            ->willReturn($consulta);
    }

    public function shouldUpdate(MockObject $repository, Consulta $consulta): void
    {
        $repository->method('update')
            ->with($this->equalTo($consulta));
    }
}
