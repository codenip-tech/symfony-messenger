<?php

declare(strict_types=1);

namespace App\Messenger\Handler;

use App\Messenger\Message\DefaultAsyncMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class DefaultAsyncMessageHandler implements MessageHandlerInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(DefaultAsyncMessage $message): void
    {
        $this->logger->info(\sprintf('DefaultAsyncMessage received. Content: %s', $message->getData()));
    }
}
