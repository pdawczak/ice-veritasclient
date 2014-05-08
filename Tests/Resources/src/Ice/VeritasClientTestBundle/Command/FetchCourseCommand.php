<?php

namespace Ice\VeritasClientTestBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\ProcessBuilder;


class FetchCourseCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setDefinition(array(
                new InputArgument('address', InputArgument::OPTIONAL, 'Address:port', 'localhost:8000'),
                new InputOption('docroot', 'd', InputOption::VALUE_REQUIRED, 'Document root', 'web/'),
                new InputOption('router', 'r', InputOption::VALUE_REQUIRED, 'Path to custom router script'),
                new InputOption('xdebug', 'x', InputOption::VALUE_REQUIRED, 'XDebug remote host'),
            ))
            ->setName('course:get')
            ->setDescription('Runs PHP built-in web server')
            ->setHelp('Help')
        ;
    }
}
