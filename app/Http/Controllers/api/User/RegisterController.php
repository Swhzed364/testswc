<?php

namespace App\Http\Controllers\api\User;

use App\Http\Controllers\BaseController;
use App\Http\Requests\User\StoreRequest;
use App\Services\User\Service;
use Illuminate\Support\Facades\Session;

class RegisterController extends BaseController
{

    public function __invoke(StoreRequest $request, Service $service)
    {
        $data = $request->validated();

        $user = $service->store($data);

        return [
            'error' => Session::get('error'),
            'result' => [
                'id' => $user->id,
                'first_name' => $user->name,
                'last_name' => $user->last_name,
            ]
        ];
    }

}
