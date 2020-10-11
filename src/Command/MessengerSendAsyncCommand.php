<?php

namespace App\Command;

use App\Messenger\Message\DefaultAsyncMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\Bridge\Amqp\Transport\AmqpStamp;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerSendAsyncCommand extends Command
{
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('app:messenger:send-async')
            ->setDescription('Sends async messages')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->bus->dispatch(
            new DefaultAsyncMessage('Default async message content'),
            [new AmqpStamp('default_queue')]
        );

        return Command::SUCCESS;
    }
}
