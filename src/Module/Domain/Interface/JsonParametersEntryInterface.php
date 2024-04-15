<?php

declare(strict_types=1);

namespace App\Module\Domain\Interface;

interface ParametersEntryInterface
{
    public function isTheMainDriver(): string;

    public function thereAreOccasionalDriver(): string;

    public function currentDate(): string;

    public function calculateNumberOfYears(): int;

    public function getNumberOfAditionalDrivers(): int;

    public function validPreviousInsurance(): string;
}