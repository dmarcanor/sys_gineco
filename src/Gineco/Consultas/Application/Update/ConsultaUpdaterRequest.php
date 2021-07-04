<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Application\Update;

final class ConsultaUpdaterRequest
{
    private $id;
    private $observacion;
    private $indicacion;
    private $motivo;
    private $reposoMedico;

    public function __construct(
        string $id,
        ?string $observacion,
        ?string $indicacion,
        ?string $motivo,
        ?string $reposoMedico
    )
    {
        $this->id = $id;
        $this->observacion = $observacion;
        $this->indicacion = $indicacion;
        $this->motivo = $motivo;
        $this->reposoMedico = $reposoMedico;
    }

    public function id(): string
    {
        return $this->id;
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
