<?php

namespace App\Repository;

use App\Model\User;
use Psr\Log\LoggerInterface;

class UserRepository
{
    private array $data;

    public function __construct(private LoggerInterface $logger)
    {
        $this->data = [
            new User(1, 'John Doe', 'test@test.com', '1234567890'),
            new User(2, 'Jane Doe', 'test2@test.com', '0987654321'),
            new User(3, 'John Smith', 'j.smith@test.com', '1231231234'),
        ];
    }

    public function findAll(): array
    {
        $this->logger->info('Fetching data from API');

        return $this->data;
    }

    public function findById(int $id)
    {
        $this->logger->info('Fetching data from API');

        return $this->data[$id];
    }
}
