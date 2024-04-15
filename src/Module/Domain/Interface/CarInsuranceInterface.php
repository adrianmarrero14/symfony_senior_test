<?php

declare(strict_types=1);

namespace App\Module\Domain\Interface;

interface CarInsuranceInterface
{
    public function getCondPpalEsTomador(): string;

    public function getConductorUnico(): string;

    public function getFecCot(): string;

    public function getAnosSegAnte(): int;

    public function getNroCondOca(): int;

    public function getSeguroEnVigor(): string;
}