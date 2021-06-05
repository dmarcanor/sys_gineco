<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Shared\Domain\ValueObjects;

use SysGineco\Gineco\Shared\Domain\Exceptions\EmptyArgumentException;

class IntValueObject
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(self $newValue): bool
    {
        return $this->value === $newValue->value();
    }

    protected function notEmpty(int $value): void
    {
        if (empty($value))
            throw new EmptyArgumentException($this->exceptionMessage, $this->exceptionCode);
    }
}
