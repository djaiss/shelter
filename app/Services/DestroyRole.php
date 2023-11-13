<?php

namespace App\Services;

use App\Models\Role;

class DestroyRole extends BaseService
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'organization_id' => 'required|integer|exists:organizations,id',
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }

    public function permissions(): array
    {
        return [
            'user_must_belong_to_organization',
            'user_must_have_the_right_to_edit_organization_roles',
        ];
    }

    public function execute(array $data): void
    {
        $this->validateRules($data);

        $role = Role::where('organization_id', $this->organization->id)
            ->findOrFail($data['role_id']);

        $role->delete();
    }
}
