<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\ViewModels\Settings\SettingsRoleViewModel;
use App\Models\Role;
use App\Services\CreateRole;
use App\Services\DestroyRole;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsProfileController extends Controller
{
    public function index(): View
    {
        return view('settings.profile.index');
    }
}
