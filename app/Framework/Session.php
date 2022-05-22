<?php

namespace App\Framework;

final class Session
{

    public function __construct()
    {
        \session_start();
    }

    public function checkCurrent(?string $bouquet)
    {

        if (isset($_SESSION['bouquet']) && $_SESSION['bouquet'] != $bouquet)
            $this->resetList();
        if (!empty($bouquet))
            $_SESSION['bouquet'] = $bouquet;
    }

    public function addToList(array $post): void
    {
        if (isset($_SESSION['list']))
            $_SESSION['list'] = [];
        $_SESSION['list'][] = $post;
    }

    private function resetList(): void
    {
        $_SESSION['list'] = [];
    }

    public function getList(): array
    {
        return isset($_SESSION['list']) ? $_SESSION['list'] : [];
    }
}
