<?php

declare(strict_types=1);

namespace App\Module\Domain\Interface;

use App\Module\Domain\Entity\CarInsurance;

interface AskPriceInterface 
{
    public function askPrices(CarInsurance $carInsurance): int;
}