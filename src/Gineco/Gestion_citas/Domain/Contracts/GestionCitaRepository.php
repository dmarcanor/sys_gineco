<?php
declare(strict_types=1);

namespace SysGineco\Gineco\Gestion_citas\Domain\Contracts;

use SysGineco\Gineco\Gestion_citas\Domain\GestionCita;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaId;

interface GestionCitaRepository
{
    public function create(GestionCita $gestionCita): void;
    public function update (GestionCita $gestionCita): void;
    public function delete (GestionCitaId $id): ?GestionCita;
}
