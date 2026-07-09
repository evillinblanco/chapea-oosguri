<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function assignRoleToUser(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = \App\Models\User::find($validated['user_id']);
        $user->roles()->syncWithoutDetaching([$validated['role_id']]);

        return response()->json(['message' => 'Role assigned successfully']);
    }

    public function removeRoleFromUser(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = \App\Models\User::find($validated['user_id']);
        $user->roles()->detach([$validated['role_id']]);

        return response()->json(['message' => 'Role removed successfully']);
    }

    public function getRoles()
    {
        return response()->json(Role::with('permissions')->get());
    }

    public function getPermissions()
    {
        return response()->json(Permission::all());
    }
}
