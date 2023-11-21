<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\ViewModels\User\UserViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(): View
    {
        return view('user.index', [
            'data' => UserViewModel::index(),
        ]);
    }

    public function new(): View
    {
        return view('team.new');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'is_public' => 'required|boolean',
        ]);

        $team = (new CreateRole(
            label: $validated['label'],
        ))->execute();

        $request->session()->flash('status', __('The team has been created'));

        return redirect()->route('team.show', [
            'team' => $team->id,
        ]);
    }

    public function show(Request $request): View
    {
        $user = $request->attributes->get('user');

        return view('user.show', [
            'data' => UserViewModel::show($user),
        ]);
    }
}
