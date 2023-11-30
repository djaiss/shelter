<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Http\ViewModels\Team\TeamViewModel;
use App\Models\Team;
use App\Services\CreateTeam;
use App\Services\DestroyTeam;
use App\Services\UpdateTeam;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Mauricius\LaravelHtmx\Http\HtmxResponseClientRedirect;

class MessageController extends Controller
{
    public function index(): View
    {
        return view('message.index');
    }
}
