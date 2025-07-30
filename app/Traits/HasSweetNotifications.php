<?php

namespace App\Traits;

trait HasSweetNotifications
{
    public function dispatchSuccessSweet(string $title, string $message, string $icon)
    {
        $this->dispatch('sweet.success', title: $title, message: $message, icon: $icon);
    }
}
