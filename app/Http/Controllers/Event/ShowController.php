<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\BaseController;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class ShowController extends BaseController
{
    public function __invoke(Event $event)
    {
        $events = Event::all();
        $user = Auth::user();

        $userEvents = $this->getUserEvents($user);

        $eventMembers = $this->getEventMembers($event);

        $date = $this->getEventDate($event);

        $isMember = $this->isMember($user, $eventMembers);

        return view('event/show',
            compact('events', 'userEvents', 'event', 'eventMembers', 'date', 'isMember'));
    }

    public function getEventMembers($event)
    {

        $eventMembers = $event->members;
        return $eventMembers->all();
    }

    public function getEventDate($event)
    {
        $dateTime = $event->created_at;
        return $dateTime->format('d m Y');
    }

    public function isMember($user, $eventMembers)
    {
        foreach($eventMembers as $eventMember)
        {
            if($eventMember->id == $user->id){
                return true;
            }
        }

        return false;
    }
}
