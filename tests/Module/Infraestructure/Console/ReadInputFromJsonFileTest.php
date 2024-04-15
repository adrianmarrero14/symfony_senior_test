<?php

namespace App\Tests\Module\Infraestructure\Console;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class ReadInputFromJsonFileTest extends KernelTestCase
{
    public function testExecute(): void
    {
        self::bootKernel();
        $application = new Application(self::$kernel);

        $command = $application->find('app:read-file');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'file_name' => 'young_driver_test.json',
        ]);

        $commandTester->assertCommandIsSuccessful();

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('<CondPpalEsTomador>S</CondPpalEsTomador>', $output);
        $this->assertStringContainsString('<ConductorUnico>N</ConductorUnico>', $output);
        $this->assertStringContainsString('<FecCot>'.date('c').'</FecCot>', $output);
        $this->assertStringContainsString('<AnosSegAnte>0</AnosSegAnte>', $output);
        $this->assertStringContainsString('<NroCondOca>0</NroCondOca>', $output);
        $this->assertStringContainsString('<SeguroEnVigor>N</SeguroEnVigor>', $output);
    }
}