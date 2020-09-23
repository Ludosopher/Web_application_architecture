<?php


namespace Service\SocialNetwork;

use Service\SocialNetwork\AuthViaSocNetInterface;
use Model\Repository\UserRepository;

class VKAdapter implements AuthViaSocNetInterface
{
    private $vk;

    public function __construct(VK $vk)
    {
        $this->vk = $vk;
    }

    public function login()
    {
        $this->vk->vk_1();
    }

    public function response(UserRepository $userRepository)
    {
        $this->vk->vk_2($userRepository);
    }
}