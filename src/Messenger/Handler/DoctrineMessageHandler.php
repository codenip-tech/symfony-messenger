<?php

declare(strict_types=1);

namespace App\Messenger\Handler;

use App\Messenger\Message\DoctrineMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class DoctrineMessageHandler implements MessageHandlerInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(DoctrineMessage $message): void
    {
        $this->logger->info(\sprintf('DoctrineMessage received. Content: %s', $message->getData()));
    }
}
