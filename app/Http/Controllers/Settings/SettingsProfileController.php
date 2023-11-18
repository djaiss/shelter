<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\ViewModels\Settings\SettingsProfileViewModel;
use App\Models\User;
use App\Services\UpdateProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsProfileController extends Controller
{
    public function index(): View
    {
        return view('settings.profile.index', [
            'data' => SettingsProfileViewModel::index(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        if (auth()->user()->email !== $request->email) {
            $validated = $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'lowercase',
                    'email',
                    'max:255',
                    'unique:' . User::class
                ],
            ]);
        } else {
            $validated = $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'lowercase',
                    'email',
                    'max:255',
                ],
            ]);
        }

        (new UpdateProfile(
            firstName: $validated['first_name'],
            lastName: $validated['last_name'],
            email: $validated['email'],
        ))->execute();

        $request->session()->flash('status', __('Changes saved'));

        return redirect()->route('settings.profile.index');
    }
}
