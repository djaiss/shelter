<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\ViewModels\Settings\SettingsRoleViewModel;
use Illuminate\View\View;

class SettingsRoleController extends Controller
{
    public function index(): View
    {
        return view('settings.role.index', [
            'data' => SettingsRoleViewModel::index(),
        ]);
    }
}
