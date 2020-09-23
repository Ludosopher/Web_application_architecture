<?php

declare(strict_types = 1);

namespace Service\SocialNetwork;

// use Service\Billing\Exception\BillingException;

use Model\Repository\UserRepository;

interface AuthViaSocNetInterface
{
    public function login();

    public function response(UserRepository $userRepository);
}
