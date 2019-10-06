<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use App\Http\Requests\SubscribeRequest;

class SubscribeController
{
    public function __invoke(SubscribeRequest $request)
    {
        Subscribe::create($request->validated());

        return redirect()->back()->with('message', trans('main.message.subscribed'));
    }
}
