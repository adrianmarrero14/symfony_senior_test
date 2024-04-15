<?php

namespace App\Module\Infraestructure\Console;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(    
    name: 'app:hi',
    description: 'Say Hi',
    hidden: false,
)]
class SayHiToUser extends Command
{
    protected function configure(): void
    {
        $this->addArgument('name', InputArgument::OPTIONAL, "If you want. Insert your name!");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument("name");
        $name ? $output->writeln("Hi ".$name.", from Check24!") : $output->writeln("Hi user from Check24!");

        return Command::SUCCESS;
    }
}