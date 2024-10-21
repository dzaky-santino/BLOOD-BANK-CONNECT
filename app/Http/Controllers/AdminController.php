<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $admin = User::find(auth()->user()->id);
        return view('admin.profile.index', compact('admin'));
    }

    public function indexAdmin() {
        $admins = User::where('role', 'admin')->get(); // Mengambil data user yang memiliki role admin
        return view('admin.data_admin.index', compact('admins'));
    }

    public function createAdmin() {
        return view('admin.data_admin.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $fileName = 'no_photo.jpg';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/image'), $fileName);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin',
            'image' => $fileName,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.data_admin')->with('success', 'Admin berhasil ditambahkan');
    }

    public function updateProfile(Request $request) {
        $admin = User::findOrFail(auth()->user()->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($admin->image && $admin->image !== 'no_photo.jpg' && file_exists(public_path('admin/image/' . $admin->image))) {
                unlink(public_path('admin/image/' . $admin->image)); 
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = $admin->image ?? 'no_photo.jpg';
        }

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $fileName,
        ]);

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Auth::user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        $admin->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('admin.profile')->with('success', 'Password berhasil diperbarui');
    }
}
