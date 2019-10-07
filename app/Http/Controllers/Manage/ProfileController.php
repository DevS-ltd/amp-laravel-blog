<?php

namespace App\Http\Controllers\Manage;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display an user profile forms.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('manage.profile.forms', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update an user profile.
     *
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update($request->validated());

        if ($request->hasFile('avatar')) {
            if ($user->hasMedia(User::AVATAR)) {
                $user->clearMediaCollection(User::AVATAR);
            }
            $user->addMedia($request->file('avatar'))->toMediaCollection(User::AVATAR);
        }

        return redirect()
            ->back()
            ->with('message', trans('manage.profile.updated'));
    }
}
