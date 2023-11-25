<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\ViewModels\Team\TeamMemberViewModel;
use App\Services\CreateTeam;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamMemberController extends Controller
{
    public function new(Request $request): View
    {
        $team = $request->attributes->get('team');

        return view('team.member.new', [
            'data' => TeamMemberViewModel::new($team),
        ]);
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
}
