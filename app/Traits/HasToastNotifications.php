<?php

namespace App\Traits;

trait HasToastNotifications
{
    public function dispatchSuccessToast(string $message)
    {
        $this->dispatch('toast.success', message: $message);
    }

    public function dispatchErrorToast(string $message)
    {
        $this->dispatch('toast.error', message: $message);
    }

    public function dispatchInfoToast(string $message)
    {
        $this->dispatch('toast.info', message: $message);
    }

    public function dispatchWarningToast(string $message)
    {
        $this->dispatch('toast.warning', message: $message);
    }
}
