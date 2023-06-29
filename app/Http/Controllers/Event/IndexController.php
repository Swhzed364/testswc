<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\BaseController;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $events = Event::all();
        $user = Auth::user();

        $userEvents = $this->getUserEvents($user);


        return view('event/index', compact('events', 'userEvents'));
    }
}
