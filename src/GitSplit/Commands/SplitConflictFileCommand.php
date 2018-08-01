<?php
/**
 * Created by PhpStorm.
 * User: vukanac
 * Date: 01.08.18
 * Time: 21:55
 */

namespace GitSplit\Commands;

use GitSplit\Splitter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SplitConflictFileCommand extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('split:file')

            // the short description shown while running "php bin/console list"
            ->setDescription('Split conflict to two files.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to split file as it was before and with new changes')

            // configure an argument
            ->addArgument('file', InputArgument::REQUIRED, 'The username of the user.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);

        // the value returned by someMethod() can be an iterator (https://secure.php.net/iterator)
        // that generates and returns the messages with the 'yield' PHP keyword
        $splitter = new Splitter();
        $lines = file($input->getArgument('file'));
        $splitted = $splitter->split($lines);
        foreach ($splitted as $target => $splittedLines) {
            $output->writeln('');
            $output->writeln($target);
            file_put_contents($target . '.txt', implode('', $splittedLines));
        }


        // outputs a message followed by a "\n"
        $output->writeln('Whoa!');

        // outputs a message without adding a "\n" at the end of the line
        $output->write('You are about to ');
        $output->write('create a user.');
    }
}
