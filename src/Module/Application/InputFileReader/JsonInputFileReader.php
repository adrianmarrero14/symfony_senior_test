<?php

declare(strict_types=1);

namespace App\Module\Application\InputFileReader;

use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Filesystem\Filesystem;

final class JsonInputFileReader
{
    private $filesystem;

	public function __construct() {
        $this->filesystem = new Filesystem;
    }

	public function __invoke(?string $name): string
	{
        $file_local_route = $name ? 'src/Shared/Files/Inputs/'.$name : 'src/Shared/Files/Inputs/old_holder_with_second_young_driver.json';

        if (!$this->filesystem->exists($file_local_route)) {
            throw new FileNotFoundException(sprintf('El archivo "%s" no existe.', $file_local_route));
        }
        return file_get_contents($file_local_route);
	}
}
