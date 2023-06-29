<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\BaseController;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class ParticipateController extends BaseController
{
    public function __invoke(Event $event)
    {
        $user = Auth::user();

        $event->members()->attach([$user->id]);

        return redirect(route('event.show', ['event' => $event->id]));
    }
}
