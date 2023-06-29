<?php

namespace App\Http\Controllers\api\Event;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Event\UpdateRequest;
use App\Models\Event;
use Illuminate\Support\Facades\Session;

class DestroyController extends BaseController
{
    public function __invoke(Event $event, UpdateRequest $request)
    {
        $data = $request->validated();
        $token = $data['api_token'];

        $creator = $event->creator;
        $creatorToken = $creator->api_token;

        if($creatorToken == $token){
            $event->delete();
        }else{
            return [
                'error' => 'Must be an author to delete'
            ];
        }

        return [
            'error' => Session::get('error'),
            'result' => [
                'event_id' => $event->id,
                'message' => 'Event deleted'
            ]
        ];
    }
}
