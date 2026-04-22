<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barangay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ✅ NO $this->middleware() - Use routes instead!
    
    public function index(Request $request)
    {
        // ✅ Role check here instead of constructor
        if (!$this->hasAdminAccess()) {
            abort(403, 'Admin access required');
        }
        
        $users = User::with('barangay')->latest()->paginate(15);
        return view('AdminPages.users', compact('users'));
    }

    public function create()
    {
        if (!$this->hasAdminAccess()) {
            abort(403, 'Admin access required');
        }
        
        $barangays = Barangay::all();
        return view('AdminPages.create-user', compact('barangays'));
    }

    public function store(Request $request)
    {
        if (!$this->hasAdminAccess()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin,evacuation_admin,barangay_admin',
            'account_category' => 'required|string|max:255',
            'account_status' => 'required|in:Active,Inactive',
            'contact_number' => 'nullable|string|max:15',
            'designation' => 'nullable|string|max:255',
            'barangay_id' => 'nullable|exists:barangays,id',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully!');
    }

    public function edit(User $user)
    {
        if (!$this->hasAdminAccess()) {
            abort(403);
        }
        
        $barangays = Barangay::all();
        return view('AdminPages.users-edit', compact('user', 'barangays'));
    }

    public function update(Request $request, User $user)
    {
        if (!$this->hasAdminAccess()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,evacuation_admin,barangay_admin',
            'account_category' => 'required|string|max:255',
            'account_status' => 'required|in:Active,Inactive',
            'contact_number' => 'nullable|string|max:15',
            'designation' => 'nullable|string|max:255',
            'barangay_id' => 'nullable|exists:barangays,id',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $updateData = $validated;
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($validated['password']);
        } else {
            unset($updateData['password']);
        }

        $user->update($updateData);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated!');
    }

    public function destroy(User $user)
    {
        if (!$this->hasAdminAccess()) {
            abort(403);
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted!');
    }

    // ✅ HELPER METHOD - Replace constructor middleware
    private function hasAdminAccess()
    {
        $user = Auth::user();
        return $user && in_array($user->role, ['admin', 'evacuation_admin', 'barangay_admin']);
    }
}