<?php

namespace App\Http\Controllers;

class dummyAPI extends Controller
{
    public function getData()
    {
        return ['name' => 'sujon', 'email' => 'sujon@test.com', 'address' => 'Rajshahi'];
    }
}
