<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\ViewModels\Team\TeamViewModel;
use App\Http\ViewModels\User\UserViewModel;
use App\Services\CreateTeam;
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
            'group-name' => 'required|string|max:255',
            'visibility' => 'required|boolean',
        ]);

        $team = (new CreateTeam(
            name: $validated['group-name'],
            isPublic: $validated['visibility'],
        ))->execute();

        $request->session()->flash('status', __('The team has been created'));

        return redirect()->route('team.show', [
            'team' => $team->id,
        ]);
    }

    public function show(Request $request): View
    {
        $team = $request->attributes->get('team');

        return view('team.show', [
            'data' => TeamViewModel::show($team),
        ]);
    }
}
