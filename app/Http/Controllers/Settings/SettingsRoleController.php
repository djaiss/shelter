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

class SettingsRoleController extends Controller
{
    public function index(): View
    {
        return view('settings.role.index', [
            'data' => SettingsRoleViewModel::index(),
        ]);
    }

    public function new(): View
    {
        return view('settings.role.new');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
        ]);

        (new CreateRole(
            label: $validated['label'],
        ))->execute();

        $request->session()->flash('status', __('The role has been created'));

        return redirect()->route('settings.role.index');
    }

    public function destroy(Request $request, Role $role): RedirectResponse
    {
        try {
            Role::where('organization_id', '!==', auth()->user()->organization_id)
                ->findOrFail($role->id);
        } catch (ModelNotFoundException) {
            $request->session()->flash('error', __('This action can not be done'));

            return redirect()->route('settings.role.index');
        }

        (new DestroyRole(
            role: $role,
        ))->execute();

        $request->session()->flash('status', __('The element has been deleted'));

        return redirect()->route('settings.role.index');
    }
}
