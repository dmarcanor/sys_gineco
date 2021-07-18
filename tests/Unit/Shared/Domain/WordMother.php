<?php

declare(strict_types=1);

namespace Tests\Unit\Shared\Domain;

use Faker\Factory;

final class WordMother
{

    public static function random(): string
    {
        return Factory::create()->word;
    }
}
