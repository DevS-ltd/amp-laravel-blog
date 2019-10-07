<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Password\UpdatePasswordRequest;

class PasswordController extends Controller
{
    /**
     * Change an user password.
     *
     * @param UpdatePasswordRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdatePasswordRequest $request)
    {
        auth()->user()->update([
            'password' => bcrypt($request->get('password')),
        ]);

        return redirect()
            ->back()
            ->with('message', trans('manage.password.updated'));
    }
}
