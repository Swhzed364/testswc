<?php

namespace App\Http\Controllers\api\Event;


use App\Http\Controllers\BaseController;
use App\Http\Requests\Event\UpdateRequest;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ParticipateController extends BaseController
{
    public function __invoke(Event $event, UpdateRequest $request)
    {
        $data = $request->validated();

        $token = $data['api_token'];

        $user = User::all()->firstWhere('api_token', $token);
        $userId = $user->id;

        $event->members()->attach([$userId]);

        return [
            'error' => Session::get('error'),
            'result' => [
                'event_id' => $event->id,
                'user_id' => $userId,
                'masssage' => 'Event member added',
            ]
        ];
    }
}
