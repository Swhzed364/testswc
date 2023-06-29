<?php

namespace App\Http\Controllers;

use App\Services\Event\Service as EventService;
use App\Services\User\Service as UserService;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public $userService;
    public $eventService;

    public function __construct(UserService $userService, EventService $eventService)
    {
        $this->userService = $userService;
        $this->eventService = $eventService;
    }

    public function getUserEvents($user)
    {


        $userEvents = $user->participatedEvents;
        return $userEvents = $userEvents->all();
    }
}
