<?php

declare(strict_types=1);

namespace App\Module\Application\CarInsuranceCreator;

use App\Module\Domain\Model\CarInsurance;
use App\Module\Domain\Model\JsonParametersEntry;

class CarInsuranceCreatorByJson
{
    public function __invoke(JsonParametersEntry $jsonParametersEntry): CarInsurance
	{
		return CarInsurance::create(
            $jsonParametersEntry->isTheMainDriver(),
            $jsonParametersEntry->thereAreOccasionalDriver(),
            $jsonParametersEntry->currentDate(),
            $jsonParametersEntry->calculateNumberOfYears(),
            $jsonParametersEntry->getNumberOfAditionalDrivers(),
            $jsonParametersEntry->validPreviousInsurance(),
        );
	}
}