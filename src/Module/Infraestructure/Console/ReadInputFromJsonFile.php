<?php

declare(strict_types=1);

namespace App\Module\Infraestructure\Console;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use App\Module\Application\InputFileReader\JsonInputFileReader;
use App\Module\Application\DataInputMapper\JsonDataInputMapper;


#[AsCommand(    
    name: 'app:read-file',
    description: 'Read input from console.',
    hidden: false,
)]
class ReadInputFromJsonFile extends Command
{
    public function __construct(
        private JsonInputFileReader $jsonInputFileReader,
        private JsonDataInputMapper $jsonDataInputMapper,
    ) {
        parent::__construct();
    }
    
    protected function configure(): void
    {
        $this->addArgument('file_name', InputArgument::OPTIONAL, 'The file name to read.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Read Input Argument
        $file_name = $input->getArgument('file_name');

        // Read Json File
        $file_content = $this->jsonInputFileReader->__invoke($file_name);

        // Read Json File
        $jsonParameterEntryModel = $this->jsonDataInputMapper->__invoke($file_content);

        // Mapping json input

        // Controller the ParameterEntryModel to CarInsuranceModel

        // Mapping xml output
        $xml = '<XML></XML>';

        // Echo XML
        var_dump($jsonParameterEntryModel);
        $output->writeln($xml);

        return Command::SUCCESS;
    }
}