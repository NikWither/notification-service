<?php

namespace App\Contracts;

use App\Models\Notification;

interface NotificationChannelInterface
{
    public function send(Notification $notification): void;
    public function getChannelName(): string;
    public function validateRecipientData(int $userId, array $data): array;
}