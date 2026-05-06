<?php

namespace App\Interfaces\Services;

use App\Models\Event;
use Illuminate\Support\Collection;

interface EventServiceInterface
{

    public function getEvents(): Collection;

    public function createEvent(array $data): Event;

    public function updateEvent(Event $event, array $data): Event;

    public function deleteEvent(Event $event): bool;

}
