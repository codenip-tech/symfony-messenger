<?php

namespace App\Command;

use App\Messenger\Message\DoctrineMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerSendDoctrineCommand extends Command
{
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:messenger:send-doctrine')
            ->setDescription('Sends doctrine messages')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $start = \microtime(true);
        for ($i = 1; $i <= 1;) {
            $this->bus->dispatch(new DoctrineMessage(\sprintf('Doctrine message #%s', $i)));
            ++$i;
        }
        $end = \microtime(true);

        $output->writeln(\sprintf('Total time: %s seconds', ($end - $start)));

        return Command::SUCCESS;
    }
}
