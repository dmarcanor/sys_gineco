<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Shared\Domain\ValueObjects;

use SysGineco\Gineco\Shared\Domain\Exceptions\EmptyArgumentException;

class FloatValueObject
{
    private $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }

    public function equals(self $newValue): bool
    {
        return $this->value === $newValue->value();
    }

    protected function notEmpty(float $value): void
    {
        if (empty($value))
            throw new EmptyArgumentException($this->exceptionMessage, $this->exceptionCode);
    }
}
