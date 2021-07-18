<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Application\Create;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\MockObject\MockObject;
use SysGineco\Gineco\Consultas\Application\Create\ConsultaCreator;
use SysGineco\Gineco\Consultas\Domain\Contracts\ConsultaRepository;
use Tests\TestCase;
use Tests\Unit\Consulta\Domain\ConsultaMother;

final class ConsultaCreatorTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * @test
     */
    public function it_should_create_a_valid_consulta()
    {
        $request = ConsultaCreatorRequestMother::random();
        $consulta = ConsultaMother::fromRequest($request);

        $repository = $this->createMock(ConsultaRepository::class);
        $this->shouldSave($repository, $consulta);

        $response = (new ConsultaCreator($repository))->__invoke($request);

        $this->assertNull($response);
    }

    private function shouldSave(MockObject $repository, \SysGineco\Gineco\Consultas\Domain\Consulta $consulta): void
    {
        $repository->method('create')
            ->with($this->equalTo($consulta));
    }
}
