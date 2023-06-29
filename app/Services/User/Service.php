<?php

namespace App\Services\User;

use App\Models\User;

class Service
{
    public function store($data)
    {
        $user = User::firstOrCreate(['login' => $data['login']], $data);

        return $user;
    }

}
