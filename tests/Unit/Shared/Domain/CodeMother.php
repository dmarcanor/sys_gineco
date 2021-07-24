<?php

declare(strict_types=1);

namespace Tests\Unit\Shared\Domain;

use Faker\Factory;

final class CodeMother
{
    public static function random(): string
    {
        return Factory::create()->text(6);
    }
}
