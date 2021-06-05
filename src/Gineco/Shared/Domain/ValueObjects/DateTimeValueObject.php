<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Shared\Domain\ValueObjects;

use SysGineco\Gineco\Shared\Domain\Exceptions\InvalidDateException;

class DateTimeValueObject
{
    private $date;

    public function __construct(string $date = 'now')
    {
        $this->date = $this->setDate($date);
    }

    public static function createFromFormat(string $format, string $dateTime): self
    {
        $dateTimeImmutable = \DateTimeImmutable::createFromFormat($format, $dateTime);

        if (false == $dateTimeImmutable)
            throw new InvalidDateException("The given date time is invalid", 400);

        return new self(
            $dateTimeImmutable->format('Y-m-d H:s:i')
        );
    }

    private function setDate(string $date): string
    {
        try {
            $date = $date != 'now'
                ? $date
                : date('Y-m-d H:s:i');

            $explodedDate = explode('-', $date);

            if (!checkdate(
                (int)$explodedDate[1],
                (int)$explodedDate[2],
                (int)$explodedDate[0]
            ))
                throw new InvalidDateException('The given date time is invalid', 400);

            return $date;
        } catch (\Exception $e) {
            throw new InvalidDateException("The given date time {$date} is invalid", 400);
        }
    }

    public static function parse(string $isoDatetime): self
    {
        $dateTimeImmutable = new \DateTimeImmutable($isoDatetime);

        return new self(
            $dateTimeImmutable->format('Y-m-d H:s:i')
        );
    }

    public static function now(): self
    {
        $dateTimeImmutable = new \DateTimeImmutable;

        return new self(
            $dateTimeImmutable->format('Y-m-d H:s:i')
        );
    }

    public function value(): string
    {
        return $this->date;
    }

    public function equals(self $newValue): bool
    {
        return $this->date === $newValue->value();
    }

    public function format(string $format): string
    {
        $dateTimeImmutable = new \DateTimeImmutable($this->date);

        return $dateTimeImmutable->format($format);
    }

    public function __toString(): string
    {
        return (string)$this->value();
    }
}
