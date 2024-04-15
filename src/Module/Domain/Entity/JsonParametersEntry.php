<?php

declare(strict_types=1);

namespace App\Module\Domain\Entity;

use App\Module\Domain\Interface\ParametersEntryInterface;

final class JsonParametersEntry implements ParametersEntryInterface
{
    private string $car_brand;
    private string $holder;
    private string $occasionalDriver;
    private string $prevInsurance_years;
    private string $prevInsurance_expirationDate;
    
    public function __construct(
        string $car_brand,
        string $holder,
        string $occasionalDriver,
        string $prevInsurance_years,
        string $prevInsurance_expirationDate,
    ){
        $this->car_brand = $car_brand;
        $this->holder = $holder;
        $this->occasionalDriver = $occasionalDriver;
        $this->prevInsurance_years = $prevInsurance_years;
        $this->prevInsurance_expirationDate = $prevInsurance_expirationDate;
    }

    public function getCarBrand(): string
    {
        return $this->car_brand;
    }

    public function isTheMainDriver(): string
    {
        return $this->holder == "CONDUCTOR_PRINCIPAL" ? "S" : "N";
    }

    public function thereAreOccasionalDriver(): string
    {
        return $this->occasionalDriver == "SI" ? "S" : "N";
    }

    public function currentDate(): string
    {
        return date("c");
    }

    public function calculateNumberOfYears(): int
    {   
        return $this->prevInsurance_years ? intval($this->prevInsurance_years) : 0;
    }

    public function getNumberOfAditionalDrivers(): int
    {
        $aditionalDrivers = 0;

        $this->occasionalDriver == "SI" ? $aditionalDrivers++ : null;

        return $aditionalDrivers;
    }

    public function validPreviousInsurance(): string
    {
        $is_valid = "N";

        if($this->prevInsurance_expirationDate){
            $dateExpiration = date("c", strtotime($this->prevInsurance_expirationDate));
            $currentDate = date("c");
            $is_valid = strtotime($currentDate) >= strtotime($dateExpiration) ? "S" : "N";
        }

        return $is_valid;
    }
}