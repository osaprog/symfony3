<?php
use AppBundle\Tests\Command\CommandTestCase;

class GenerateFilesCommandTest extends CommandTestCase
 { 
    public function testGenerateFilesCommand()
     {
         $client = self::createClient();
         $output = $this->runCommand($client, "app:generate-file");         
         $this->assertContains(sprintf('test-%s.%s', date('Y-m-d'), 'csv'), $output);
         unlink(sprintf('test-%s.%s', date('Y-m-d'), 'csv'));
      }
 }