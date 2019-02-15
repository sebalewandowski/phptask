<?php

namespace AppBundle\Command;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Model\NumericalSequence;
use Symfony\Component\Console\Question\Question;

class ConsoleCommand extends Command {

    const DEFAULT_INTERVAL_TIME = 10;

    /**
     * @var NumericalSequence
     */
    private $sequence;

    public function __construct(NumericalSequence $sequence)
    {
        parent::__construct("run");
        $this->sequence = $sequence;
    }

    protected function configure()
    {
        $this->addArgument("task", InputArgument::OPTIONAL, "Please provide first n to calculate sequence");
        $this->setDescription('Starts the calculation for numbers in sequence');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $consoleArgument = $input->getArgument("task");

        $helper   = $this->getHelper("question");
        $question = new Question('Please provide first n to calculate (the number should be (1 ≤ n ≤ 99 999)): <comment>[1]</comment> ', 1);

        $question->setValidator(function ($answer) {
            if (!is_numeric($answer)) {
                throw new \RuntimeException('The n should be an integer.');
            }

            // TODO better validation in separate class
            if (intval($answer) < 1) {
                throw new \RuntimeException('n should be within range 1 < n < 99999');
            }

            return $answer;
        });

        $question->setMaxAttempts(10);

        $i = 0;

        while ($i++ < 10) {
            try {
                $bundleName = $helper->ask($input, $output, $question);

                if (!is_numeric($bundleName)) {
                    $output->writeln("The n should be an integer, you've provided: <error>$bundleName</error>");
                    break;
                }

                $this->sequence->elementOfSequence(intval($bundleName));
                $max = $this->sequence->maxFor($bundleName);
                $output->writeln("For provided n, the max is: <info>$max</info>");
            } catch (Exception $e) {
                $output->writeln('<error>' . $e->getMessage() . '</error>');
            }
        }
    }
}