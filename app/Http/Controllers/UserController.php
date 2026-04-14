<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // This allows the controller to access your database

class UserController extends Controller
{
    /**
     * Display the User List (with Search Logic)
     */
    public function index(Request $request)
    {
        // Get the search input from the URL
        $search = $request->input('search');

        // Fetch users: filter by name or email if a search term exists
        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->get();

        return view('user_list', compact('users'));
    }

    /**
     * Show the Edit Form for a specific user
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find user or show 404 error
        return view('user_edit', compact('user'));
    }

    /**
     * Update the user details (Task 3: Unique Email)
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validation logic
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'nickname'   => 'nullable|string|max:255',
          
            'email'      => 'required|email|unique:users,email,' . $id,
            'age'        => 'required|numeric|min:1',
            'contact_number' => 'required',
        ]);

        $user->update($validated);

        // Redirect back with a success status
        return redirect('/users')->with('status', 'User updated successfully!');
    }

    /**
     * Delete a user record
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('status', 'User deleted successfully!');
    }
}