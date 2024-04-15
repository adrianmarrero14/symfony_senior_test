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
use App\Module\Application\CarInsuranceCreator\CarInsuranceCreatorByJson;
use App\Module\Application\DataOutputMapper\XMLDataOutputMapper;


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
        private CarInsuranceCreatorByJson $carInsuranceCreator,
        private XMLDataOutputMapper $XMLDataOutputMapper, 
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

        // Mapping json input
        $jsonParameterEntryModel = $this->jsonDataInputMapper->__invoke($file_content);

        // Mapping JsonParametersEntryEntity to CarInsuranceEntity
        $carInsuranceEntity = $this->carInsuranceCreator->__invoke($jsonParameterEntryModel);

        // Mapping xml output
        $xml = $this->XMLDataOutputMapper->__invoke($carInsuranceEntity);

        // Echo Output
        $file_name = $file_name ?? "old_holder_with_second_young_driver.json";

        $output->writeln("***************************************");
        $output->writeln("** Json File Name: " . $file_name);
        $output->writeln("***************************************");
        $output->writeln("** XML output for you API call:");
        $output->writeln("***************************************");
        $output->writeln($xml);

        return Command::SUCCESS;
    }
}