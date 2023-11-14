<?php

namespace App\Http\ViewModels\Settings;

use App\Models\Level;
use App\Models\Role;

class SettingsRoleViewModel
{
    public static function index(): array
    {
        $roles = Role::where('organization_id', auth()->user()->organization_id)
            ->get()
            ->map(fn (Role $role) => self::role($role))
            ->sortBy('label');

        $levels = Level::where('organization_id', auth()->user()->organization_id)
            ->get()
            ->map(fn (Level $level) => self::level($level))
            ->sortBy('label');

        return [
            'roles' => $roles,
            'levels' => $levels,
        ];
    }

    public static function role(Role $role): array
    {
        return [
            'id' => $role->id,
            'label' => $role->label,
        ];
    }

    public static function level(Level $level): array
    {
        return [
            'id' => $level->id,
            'label' => $level->label,
        ];
    }
}
