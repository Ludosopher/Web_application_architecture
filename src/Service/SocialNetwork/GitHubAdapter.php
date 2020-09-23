<?php


namespace Service\SocialNetwork;

use Service\SocialNetwork\AuthViaSocNetInterface;
use Model\Repository\UserRepository;

class GitHubAdapter implements AuthViaSocNetInterface
{
    private $github;

    public function __construct(GitHub $github)
    {
        $this->github = $github;
    }

    public function login()
    {
        $this->github->github_1();
    }

    public function response(UserRepository $userRepository)
    {
        $this->github->github_2($userRepository);
    }
}