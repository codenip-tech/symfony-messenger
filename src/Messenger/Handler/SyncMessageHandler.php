<?php

declare(strict_types=1);

namespace App\Messenger\Handler;

use App\Messenger\Message\SyncMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SyncMessageHandler implements MessageHandlerInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(SyncMessage $message): void
    {
        $this->logger->info(\sprintf('SyncMessage received. Content: %s', $message->getData()));
    }
}
