<?php

namespace App;

use Psr\Log\LoggerInterface;

class GreetingGenerator
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * GreetingGenerator constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return string
     */
    public function getRandomGreeting(): string
    {
        $greetings = ['Hey', 'Yo', 'Aloha'];
        $greeting = $greetings[array_rand($greetings)];

        $this->logger->info('Using the greeting: ' . $greeting);

        return $greeting;
    }
}