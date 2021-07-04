<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Application\Create;

final class ConsultaCreatorRequest
{
    private $id;
    private $codigo;
    private $fecha;
    private $observacion;
    private $indicacion;
    private $motivo;
    private $reposoMedico;

    public function __construct(
        string $id,
        string $codigo,
        string $fecha,
        ?string $observacion,
        ?string $indicacion,
        ?string $motivo,
        ?string $reposoMedico
    )
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->fecha = $fecha;
        $this->observacion = $observacion;
        $this->indicacion = $indicacion;
        $this->motivo = $motivo;
        $this->reposoMedico = $reposoMedico;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function codigo(): string
    {
        return $this->codigo;
    }

    public function fecha(): string
    {
        return $this->fecha;
    }

    public function observacion(): ?string
    {
        return $this->observacion;
    }

    public function indicacion(): ?string
    {
        return $this->indicacion;
    }

    public function motivo(): ?string
    {
        return $this->motivo;
    }

    public function reposoMedico(): ?string
    {
        return $this->reposoMedico;
    }

}
