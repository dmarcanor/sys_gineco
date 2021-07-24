<?php
declare(strict_types=1);

namespace SysGineco\Gineco\Gestion_citas\Application\Create;

final class GestionCitasCreatorRequest
{
    private $id;
    private $pacienteId;
    private $codigo;
    private $fecha;
    private $estado;
    private $ecografia;

    public function __construct(
    string  $id,
    string  $pacienteId,
    string  $codigo,
    string  $fecha,
    string  $estado,
    ?string $ecografia
    )
    {
    $this->id = $id;
    $this->pacienteId = $pacienteId;
    $this->codigo = $codigo;
    $this->fecha = $fecha;
    $this->estado = $estado;
    $this->ecografia = $ecografia;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function pacienteId(): string
    {
        return $this->pacienteId;
    }

    public function codigo(): string
    {
        return $this->codigo;
    }

    public function fecha(): string
    {
        return $this->fecha;
    }

    public function estado(): string
    {
        return $this->estado;
    }

    public function ecografia(): ?string
    {
        return $this->ecografia;
    }
}
