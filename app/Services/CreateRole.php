<?php

namespace App\Services;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class CreateRole extends BaseService
{
    private Role $role;

    public function __construct(
        public string $label,
    ) { }

    public function execute(): Role
    {
        $this->checkPermissions();
        $this->create();
        return $this->role;
    }

    public function checkPermissions(): void
    {
        if (auth()->user()->permissions !== User::ROLE_ACCOUNT_MANAGER ||
            auth()->user()->permissions !== User::ROLE_ADMINISTRATOR) {
            throw new \Exception(__('You do not have permission to do this action.'));
        }
    }

    public function create(): void
    {
        $this->role = Role::create([
            'organization_id' => auth()->user()->organization_id,
            'label' => $this->label,
        ]);
    }
}
