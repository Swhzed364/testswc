<?php

namespace App\Http\Controllers\api\Event;


use App\Http\Controllers\BaseController;
use App\Http\Resources\Event\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $events = Event::all();

        $events = EventResource::collection($events);
        return $events;
    }
}
