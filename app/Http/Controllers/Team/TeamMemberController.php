<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\ViewModels\Team\TeamMemberViewModel;
use App\Http\ViewModels\Team\TeamViewModel;
use App\Models\Team;
use App\Models\User;
use App\Services\AddUserToTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class TeamMemberController extends Controller
{
    public function new(Request $request): View
    {
        $team = $request->attributes->get('team');

        if ($request->header('hx-request')) {
            return view('team.partials.user-new', [
                'data' => TeamMemberViewModel::new($team),
            ]);
        }
    }

    public function store(Request $request, Team $team): string
    {
        $potentialMember = User::where('organization_id', auth()->user()->organization_id)
            ->where('id', $request->route()->parameter('member'))
            ->firstOrFail();

        $team = (new AddUserToTeam(
            team: $request->attributes->get('team'),
            user: $potentialMember,
        ))->execute();

        Cache::forget('team-users-' . $team->id);

        return FacadesView::renderFragment('team.show', 'user-list', [
            'data' => TeamViewModel::show($team, true),
        ]);
    }
}
