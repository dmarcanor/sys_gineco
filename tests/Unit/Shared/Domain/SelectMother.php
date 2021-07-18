<?php

declare(strict_types=1);

namespace Tests\Unit\Shared\Domain;

use Faker\Factory;

final class SelectMother
{
    public static function fromValues(array $values)
    {
        return Factory::create()->randomElement($values);
    }
}
