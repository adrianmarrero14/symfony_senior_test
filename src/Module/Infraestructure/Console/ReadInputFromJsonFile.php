<?php

namespace App\Module\Infraestructure\Console;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(    
    name: 'app:read-file',
    description: 'Read input from console.',
    hidden: false,
)]
class ReadInputFromJsonFile extends Command
{
    public function __construct(
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

        // Read Json File

        // Mapping json input

        // Controller the ParameterEntryModel to CarInsuranceModel

        // Mapping xml output
        $xml = '<XML></XML>';

        // Echo XML
        $output->writeln($xml);

        return Command::SUCCESS;
    }
}