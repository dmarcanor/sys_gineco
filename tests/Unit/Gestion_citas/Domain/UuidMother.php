<?php
declare(strict_types=1);

namespace Tests\Unit\Gestion_citas\Domain;

use Faker\Factory;

final class UuidMother
{
    public static function random(): string
    {
        return Factory::create()->unique()->uuid;
    }
}
