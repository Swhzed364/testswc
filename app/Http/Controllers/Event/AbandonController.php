<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\BaseController;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbandonController extends BaseController
{
    public function __invoke(Event $event)
    {
        $user = Auth::user();

        $event->members()->detach([$user->id]);

        return redirect(route('event.show', ['event' => $event->id]));
    }
}
