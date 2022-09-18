<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class DataService
{
    protected $data = [
        [
            'name' => 'jack',
            'email' => 'jack@email'
        ]
    ];


    public function addData($formData)
    {
        foreach($this->data as $value){
            if (in_array($formData['email'], $value)) {
                Log::error('This email already exists.');
                Session::flash('error', 'This email already exists.');
            } else {
                $this->data[] = [
                    'name' => $formData['name'],
                    'email' => $formData['email']
                ];
                Log::info('Success');
                Session::flash('success', 'Success');
            }
        }

    }

}
