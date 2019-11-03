<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiRequest;
use App\Mail\FormSubmitted;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    public function post(ApiRequest $request)
    {
        $content = [
            'success' => true
        ];

        Mail::send(new FormSubmitted(
            $request->post('company'),
            $request->post('dateStart'),
            $request->post('dateEnd'),
            $request->post('email')
        ));

        return response(
            json_encode($content),
            200
        );
    }
}
