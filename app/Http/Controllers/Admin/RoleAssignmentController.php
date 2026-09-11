<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Roles\RoleAssignmentServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleAssignmentController extends Controller
{
    public function __construct(
        protected RoleAssignmentServiceInterface $roleAssignmentService
    ) {}

    public function index(): View
{
    return view('admin.roles.index', [
        'title' => 'Manajemen Role & Permission',
        'users' => $this->roleAssignmentService->allUsersWithRoles(),
        'roles' => $this->roleAssignmentService->allRoles(),
    ]);
}

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'role_name' => ['required', 'string', 'exists:master_role,role_name'],
        ]);

        $this->roleAssignmentService->assign($validated['user_id'], $validated['role_name']);

        return back()->with('success', 'Role berhasil di-assign.');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'role_name' => ['required', 'string', 'exists:master_role,role_name'],
        ]);

        $this->roleAssignmentService->revoke($validated['user_id'], $validated['role_name']);

        return back()->with('success', 'Role berhasil dicabut.');
    }
}