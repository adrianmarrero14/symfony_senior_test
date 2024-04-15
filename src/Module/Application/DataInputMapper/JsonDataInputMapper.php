<?php

declare(strict_types=1);

namespace App\Module\Application\DataInputMapper;

use App\Module\Domain\Entity\JsonParametersEntry;
use App\Shared\SerializerHelper;

final class JsonDataInputMapper
{
	public function __invoke(string $json): JsonParametersEntry
	{
		return SerializerHelper::jsonToModel($json, JsonParametersEntry::class);
	}
}
