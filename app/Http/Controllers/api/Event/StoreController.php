<?php

namespace App\Http\Controllers\api\Event;


use App\Http\Controllers\BaseController;
use App\Http\Controllers\Event\StoreController as EventStoreController;
use App\Http\Requests\Event\StoreRequest;
use App\Http\Resources\Event\EventResource;
use App\Services\Event\Service;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request, Service $service)
    {
        $data = $request->validated();

        $event = $service->store($data);

        return new EventResource($event);
    }
}
