<?php

namespace App\Module\Domain\Entity;

use App\Module\Domain\Interface\CarInsuranceInterface;

final class CarInsurance implements CarInsuranceInterface
{
    private string $CondPpalEsTomador;
    private string $ConductorUnico;
    private string $FecCot;
    private int $AnosSegAnte;
    private int $NroCondOca;
    private bool $SeguroEnVigor;

    public function __construct(
        string $CondPpalEsTomador, 
        string $ConductorUnico, 
        string $FecCot, 
        int $AnosSegAnte, 
        int $NroCondOca, 
        bool $SeguroEnVigor,
    ){
        $this->CondPpalEsTomador = $CondPpalEsTomador;
        $this->ConductorUnico = $ConductorUnico;
        $this->FecCot = $FecCot;
        $this->AnosSegAnte = $AnosSegAnte;
        $this->NroCondOca = $NroCondOca;
        $this->SeguroEnVigor = $SeguroEnVigor;
    }

    public static function create(
        string $CondPpalEsTomador, 
        string $ConductorUnico, 
        string $FecCot, 
        int $AnosSegAnte, 
        int $NroCondOca, 
        string $SeguroEnVigor
    ): self
    {
        return new self(
            $CondPpalEsTomador, 
            $ConductorUnico, 
            $FecCot, 
            $AnosSegAnte, 
            $NroCondOca, 
            $SeguroEnVigor
        );
    }

    public function getCondPpalEsTomador(): string
    {
        return $this->CondPpalEsTomador;
    }

    public function getConductorUnico(): string
    {
        return $this->ConductorUnico;
    }

    public function getFecCot(): string
    {
        return $this->FecCot;
    }

    public function getAnosSegAnte(): int
    {
        return $this->AnosSegAnte;
    }

    public function getNroCondOca(): int
    {
        return $this->NroCondOca;
    }

    public function getSeguroEnVigor(): string
    {
        return $this->SeguroEnVigor;
    }
}