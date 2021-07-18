<?php

declare(strict_types=1);

namespace Tests\Unit\Shared\Domain;

use Faker\Factory;

final class NumberMother
{
    public static function random(): int
    {
        return Factory::create()->randomNumber();
    }

    public static function randomPositive(): int
    {
        return Factory::create()->numberBetween(0, 50000);
    }
}
