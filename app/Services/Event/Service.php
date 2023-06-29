<?php

namespace App\Services\Event;

use App\Models\Event;

class Service
{
    public function store($data)
    {
        $event = Event::firstOrCreate([
            'title' => $data['title'],
            'text' => $data['text']
        ], $data);

        return $event;
    }
}

