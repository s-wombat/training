<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // $user->employment_date = $this->dateFormat($user);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('users.index')
                        ->with('success', 'User deleted successfully');
    }
    
    public function filter(Request $request)
    {
        if (!$request) {
            return view('users.index');
        }
            
        $filter = $request->filter;
        $users = User::where(function($query) use ($filter){

            $query->orWhere('email', 'LIKE', "%$filter%")
                ->orWhereDate('created_at', '=', $filter);
        })
        ->paginate(10);

        $response = $users->toJson();

        return view('users.index', compact('users', 'filter'));
    }

    public function clear()
    {
        return view('users.index');
    }
}