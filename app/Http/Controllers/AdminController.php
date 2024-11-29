<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $professors = User::where('role', 'professor')->get();
        return view('admin.professors.index', compact('professors'));
    }

    public function create()
    {
        return view('admin.professors.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'department' => 'required',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'professor',
            'department' => $validatedData['department'],
        ]);

        return redirect()->route('admin.professors.index')->with('success', 'Professor created successfully.');
    }

    public function edit(User $professor)
    {
        return view('admin.professors.edit', compact('professor'));
    }

    public function update(Request $request, User $professor)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $professor->id,
            'password' => 'nullable|min:6|confirmed',
            'department' => 'required',
        ]);

        $professor->name = $validatedData['name'];
        $professor->email = $validatedData['email'];
        if (!empty($validatedData['password'])) {
            $professor->password = Hash::make($validatedData['password']);
        }
        $professor->department = $validatedData['department'];
        $professor->save();

        return redirect()->route('admin.professors.index')->with('success', 'Professor updated successfully.');
    }

    public function destroy(User $professor)
    {
        $professor->delete();

        return redirect()->route('admin.professors.index')->with('success', 'Professor deleted successfully.');
    }
}
