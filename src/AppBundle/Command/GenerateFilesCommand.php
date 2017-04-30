<?php

// src/AppBundle/Command/CreateUserCommand.php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use WriterBundle\Entity\Customer;
class GenerateFilesCommand extends ContainerAwareCommand {

    protected function configure() {
        $this

                // the name of the command (the part after "bin/console")
                ->setName('app:generate-file')
                ->addArgument('format', InputArgument::OPTIONAL, 'Which file format? print for CSV 1 or empty, for Json 2, for XML 3')

                // the short description shown while running "php bin/console list"
                ->setDescription('Generate Files in different Format.')

                // the full command description shown when running the command with
                // the "--help" option
                ->setHelp('This command allows you to generate a file in different format CSV, JSON, XML.'
                        . ' print for CSV 1, for Json 2, for XML 3 Ex. app:generate-file 1 for CSV. Default is CSV')
        ;
    }
    /**
     * 
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output) {

        $repository = $this->getContainer()->get('doctrine.orm.entity_manager')->getRepository(Customer::class);
        $customers = $repository->findAll();

        $format = $input->getArgument('format');
        switch ($format) {
            case 2:
                $fileGenerateService = $this->getContainer()->get('writer.json');
                $fileExtension = 'json';
                break;
            case 3:
                $fileGenerateService = $this->getContainer()->get('writer.xml');
                $fileExtension = 'xml';
                break;
            default:
                $fileGenerateService = $this->getContainer()->get('writer.csv');
                $fileExtension = 'csv';
        }
        if ($fileGenerateService && $customers) {
            $fileGenerateService->generate($customers, sprintf('test-%s.%s', date('Y-m-d'), $fileExtension));
        }
    }

}
