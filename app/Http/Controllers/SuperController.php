<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Sections;
use App\Models\Ship;
use App\Models\Fee;
use App\Models\Scategory;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;    


class SuperController extends Controller
{
    //

    public function view_section()
    {
        $data = Sections::all();
        return view('superadmin.section',compact('data'));
    }


    public function add_section(Request $request)
    {
        $section = new Sections;

        $section->section_name = $request->section;

        $section->user_id = Auth::id();

        $section->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Section Added Succesfully');

        return redirect()->back();
    }
 
    public function delete_section($id)
    {
         $section = Sections::find($id);

         $section->delete();

         toastr()->timeOut(5000)->closeButton()->addSuccess('Section Deleted Succesfully');

         return redirect()->back();
    }


    public function view_ship()
    {
        $data = Ship::all();
        return view('superadmin.ship',compact('data'));
    }


    public function add_ship(Request $request)
    {
        $ship = new Ship;

        $ship->shipping_name = $request->ship;

        $ship->user_id = Auth::id();

        $ship->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Ship Added Succesfully');

        return redirect()->back();
    }

    public function delete_ship($id)
    {
         $ship = Ship::find($id);

         $ship->delete();

         toastr()->timeOut(5000)->closeButton()->addSuccess('Ship Deleted Succesfully');

         return redirect()->back();
    }

    public function view_fee()
    {
        $data = Fee::all();
        return view('superadmin.fee',compact('data'));
    }

    // public function add_fee(Request $request)
    // {
    //     $fee = new Fee;

    //     $fee->general_fee = $request->fee;

    //     $fee->user_id = Auth::id();

    //     $fee->save();

    //     toastr()->closeButton()->timeOut(5000)->addSuccess('Fee Added Succesfully');

    //     return redirect()->back();
    // }

    public function delete_fee($id)
    {
         $fee = Fee::find($id);

         $fee->delete();

         toastr()->timeOut(5000)->closeButton()->addSuccess('Fee Deleted Succesfully');

         return redirect()->back();
    }

    
    public function edit_fee($id)
    {
        // Get the fee to edit
        $editFee = Fee::find($id);
        
        // Retrieve all fees again to display in the table
        $data = Fee::all();

        return view('superadmin.fee', compact('editFee', 'data'));
    }

    public function update_fee(Request $request, $id)
    {
        // Find the fee by ID and update its value
        $fee = Fee::find($id);
        $fee->general_fee = $request->fee;
        $fee->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Fee Updated Successfully');
        return redirect()->back();
    }


    // =========== department --------------------
    public function view_department()
    {
        $data = Department::all();
        return view('superadmin.department',compact('data'));
    }


    public function add_department(Request $request)
    {
        $request->validate([
            'department' => 'required|string|max:255',
            'department_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);

        $department = new Department;

        // Set the department name
        $department->department_name = $request->department;

        // Set the user ID
        $department->user_id = Auth::id();

        // Handle file upload
        if ($request->hasFile('department_image')) {
            $file = $request->file('department_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('department_images'), $filename); // Save file to public/department_images
            $department->department_image = 'department_images/' . $filename; // Save path to database
        }

        $department->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Department Added Successfully');

        return redirect()->back();
    }


    public function delete_department($id)
    {
         $department = Department::find($id);

         $department->delete();

         toastr()->timeOut(5000)->closeButton()->addSuccess('Department Deleted Succesfully');

         return redirect()->back();
    }

     // =========== super category --------------------
     public function view_supercategory()
     {
         $data = Scategory::all();
         return view('superadmin.super_category', compact('data'));
     }
     
     public function add_supercategory(Request $request)
     {
         // Validate input
         $request->validate([
             'supercategory' => 'required|string|max:255',
             'super_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
         ]);
     
         // Create a new instance of Scategory
         $supercategory = new Scategory;
     
         // Assign the supercategory status
         $supercategory->super_category = $request->supercategory;
     
         // Assign the user ID
         $supercategory->user_id = Auth::id();
     
         // Handle the image upload
         if ($request->hasFile('super_image')) {
             $image = $request->file('super_image');
             $imageName = time() . '_' . $image->getClientOriginalName();
             $image->move(public_path('super_image_category'), $imageName);
             $supercategory->super_image = 'super_image_category/' . $imageName; // Save image path
         }
     
         // Save the supercategory
         $supercategory->save();
     
         // Display success message
         toastr()->closeButton()->timeOut(5000)->addSuccess('Supercategory Added Successfully');
     
         return redirect()->back();
     }
     
     public function delete_supercategory($id)
     {
         $supercategory = Scategory::find($id);
     
         // Delete the associated image file, if it exists
         if ($supercategory->super_image && file_exists(public_path($supercategory->super_image))) {
             unlink(public_path($supercategory->super_image));
         }
     
         // Delete the supercategory record
         $supercategory->delete();
     
         // Display success message
         toastr()->timeOut(5000)->closeButton()->addSuccess('Supercategory Deleted Successfully');
     
         return redirect()->back();
     }


     public function users()
    {
        $users = User::all(); // Fetch all users
        return view('superadmin.show_users', compact('users')); // Pass users to the view
    }


    // Show the edit form
    public function editUser($id)
    {
        $user = User::findOrFail($id); // Find the user by ID or throw 404
        return view('superadmin.edit_users', compact('user'));
    }

    // Handle update request
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'shop_name' => 'nullable|string|max:255',
            'view_shop' => 'nullable|string',
            'college' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:10240', // Max 10MB
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $user = User::findOrFail($id);

        // Update user fields
        $user->name = $request->name;
        $user->shop_name = $request->shop_name;
        $user->view_shop = $request->view_shop;
        $user->college = $request->college;
        $user->email = $request->email;
        $user->phone = $request->phone;

        // Handle logo upload if provided
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $user->logo = $filename;
        }

        $user->save(); // Save the changes
        return redirect()->route('superadmin.users')->with('success', 'User updated successfully!');
    }
}


