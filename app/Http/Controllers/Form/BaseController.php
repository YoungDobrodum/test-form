<?php

namespace App\Http\Controllers\Form;

use App\Http\Services\DataService;

class BaseController
{
    protected $service;

    public function __construct(DataService $service)
    {
        $this->service = $service;
    }
}
