<?php

declare(strict_types=1);

namespace App\Module\Application\DataOutputMapper;

use App\Module\Domain\Model\CarInsurance;
use App\Shared\SerializerHelper;

final class XMLDataOutputMapper
{
	public function __invoke(CarInsurance $carInsurance): string
	{
		return SerializerHelper::modelToXML($carInsurance);
	}
}
