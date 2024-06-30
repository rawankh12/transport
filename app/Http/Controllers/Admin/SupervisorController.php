<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Address;
use App\Models\User;
use App\Models\Section;

class SupervisorController extends Controller
{
    public function index()
    {
        // Fetch all supervisors from the database
        $supervisors = User::where('role_id', '=' ,'2')->get(); // Adjust the condition as per your actual user role setup
        // Fetch the sections and related addresses
        $supervisors->load('section.address');

        return view('supervisor.index', compact('supervisors'));
    }

    public function createaddres()
    {
    $addresses = Address::all(); // جلب جميع الفروع
    return view('supervisors.create', compact('addresses')); // تمرير الفروع إلى العرض
    }

    public function create()
    {
        return view('supervisor.createsupervisor');
    }

    public function store(Request $request)
    {
       // $addressid = Address::get('address->id');
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6',
            'phone' => 'required|string',
            // 'address' => 'required|string',
        ]);

        try {
            // Create a new user record
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->role_id = 2; // Assuming supervisor role ID is 2
            // $user->address_id = $addressid;
            $user->save();

            // Flash success message
            Session::flash('success', 'تم إضافة المشرف بنجاح.');

        } catch (\Exception $e) {
            // Flash error message if an exception occurs
            Session::flash('error', 'حدث خطأ أثناء إضافة المشرف: ' . $e->getMessage());
        }

        // Redirect back to where the form was submitted from
        return redirect()->back();
    }

    public function destroy($id)
    {
        // Find the supervisor by ID
        $supervisor = User::findOrFail($id); // Assuming 'User' is your model

        // Delete the supervisor record
        $supervisor->delete();

        // Redirect to the supervisors index page with success message
        Session::flash('success', 'تم حذف المشرف بنجاح.');
        return redirect()->route('supervisors.index');
    }

}
