<?php

declare(strict_types=1);

namespace App\Module\Domain\Entity;

use App\Module\Domain\Interface\ParametersEntryInterface;

final class JsonParametersEntry implements ParametersEntryInterface
{
    private string $car_brand;
    private string $holder;
    private string $occasionalDriver;
    private string $prevInsurance_contractDate;
    private string $prevInsurance_expirationDate;
    
    public function __construct(
        string $car_brand,
        string $holder,
        string $occasionalDriver,
        string $prevInsurance_contractDate,
        string $prevInsurance_expirationDate,
    ){
        $this->car_brand = $car_brand;
        $this->holder = $holder;
        $this->occasionalDriver = $occasionalDriver;
        $this->prevInsurance_contractDate = $prevInsurance_contractDate;
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

    // ValueObject: Calculate number of years from ???
    // NUMBER OF YEARS AS *FULL YEARS*
    // OPTIONS:
    // prevInsurance_contractDate
    // prevInsurance_expirationDate
    // prevInsurance_years
    // prevInsurance_companyYear
    public function calculateNumberOfYears(): int
    {   
        $numberOfYears = 0;
        
        if($this->prevInsurance_contractDate){
            $datePrevious = date("Y", strtotime($this->prevInsurance_contractDate));
            $currentYear = date('Y');
            $numberOfYears = $currentYear - $datePrevious;
        }

        return $numberOfYears;
    }

    // NUMBER OF ADITIONAL DRIVERS: ???
    // OPTIONS:
    // If occasionalDriver == "SI" ? 1 : 0
    public function getNumberOfAditionalDrivers(): int
    {
        return $this->occasionalDriver == "SI" ? 1 : 0;
    }

    // PREVIOUS INSURANCE IS VALID: ???
    // ValueObject: Calculate if is not expired and if is yes
    // OPTIONS:
    // prevInsurance_expirationDate
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