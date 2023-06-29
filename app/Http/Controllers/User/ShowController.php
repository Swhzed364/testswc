<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends BaseController
{
    public function __invoke(User $user)
    {
        $events = Event::all();
        $authUser = Auth::user();

        $userEvents = $this->getUserEvents($authUser);

        $dateOfBirth = $this->getDateOfBirthFormated($user);

        return view('user/show', compact('user', 'dateOfBirth', 'events', 'userEvents'));
    }

    public function getDateOfBirthFormated($user)
    {
        $dateOfBirth = $user->date_of_birth;
        $dateOfBirth = explode(' ', $dateOfBirth);
        return $dateOfBirth[0];
    }
}
