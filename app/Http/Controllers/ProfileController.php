<?php
namespace App\Http\Controllers; 

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Department; // Correct import for Department 
use App\Models\Sections;    
use App\Models\Cart;
use App\Models\Scategory;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View 
    {
        $departments = Department::all(); // Fetch all departments
        $sections = Sections::all(); // Fetch all sections

        return view('profile.edit', [
            'user' => $request->user(),
            'departments' => $departments, // Pass departments to the view
            'sections' => $sections, // Pass sections to the view
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
    
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
        ]);
        // Update the user's profile information
        $user->fill($request->validated());
    
        // Handle the logo file upload
        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($user->logo && file_exists(public_path('logo/' . $user->logo))) {
                unlink(public_path('logo/' . $user->logo));
            }
    
            // Handle the file upload like in the upload_product method
            $image = $request->file('logo');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('logo'), $imagename);  // Store the image in public/logo
            $user->logo = $imagename;  // Store only the file name in the database
        }
    
        // If the email is changed, mark it as unverified
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

    
    
        // Save the updated user profile
        $user->save();
        session()->flash('success', 'Profile updated successfully!');
        // Redirect with a status message
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    public function user_profile(Request $request): View
    {
        $scategory = Scategory::all(); 

        $departments = Department::all(); // Fetch all departments
        $sections = Sections::all(); // Fetch all sections

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
    

        return view('profile.user_profile', [
            'user' => $request->user(), // Pass the authenticated user
            'departments' => $departments, // Pass departments to the view
            'sections' => $sections, // Pass sections to the view
            'scategory' => $scategory,
            'count' => $count,
        ]);
    }

    /**
     * Handle the profile update.
     */
    public function profile_update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Validate input fields (additional validation rules can go here)
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
        ]);

        // Update the user's profile information
        $user->fill($request->except(['password', 'logo']));

        // Update the password only if it is provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Handle the logo file upload
        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($user->logo && file_exists(public_path('logo/' . $user->logo))) {
                unlink(public_path('logo/' . $user->logo));
            }

            // Upload the new logo
            $image = $request->file('logo');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('logo'), $imagename); // Save in 'public/logo'
            $user->logo = $imagename; // Store the file name in the database
        }

        // If the email is changed, mark it as unverified
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Save the updated user profile
        $user->save();

        // Flash a success message to the session
        session()->flash('success', 'Profile updated successfully!');

        // Redirect back to the edit page with a status message
        return Redirect::route('profile.user_profile')->with('status', 'profile-updated');
    }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validate password before deleting account
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Logout the user
        Auth::logout();

        // Delete the user record
        $user->delete();

        // Invalidate session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to home page
        return Redirect::to('/');
    }

    public function update_password()
    {
        $scategory = Scategory::all(); 

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
        $user = auth()->user(); // Get the authenticated user
        return view('profile.partials.update-password-form', compact('user','scategory','count'));
    }
    
    public function user_page()
    {
        $scategory = Scategory::all(); 

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
        
        $user = auth()->user(); // Get the authenticated user
        return view('home.user_page', compact('user','scategory','count'));
    }

    public function user_details()
    {
        // Get the logged-in user's entire record
        $user = Auth::user();

        // Pass the user data to the view
        return view('includes.user_header', ['user' => $user]);
    }

    public function handleBack(Request $request)
    {
        $previousUrl = $request->input('previous_url');
        $currentUrl = $request->input('current_url');

        // Check if the user is trying to revisit the same URL twice
        if (session('last_visited') === $currentUrl) {
            // Redirect to the home page if revisiting the same URL
            return redirect()->route('home');
        }

        // Store the current URL in the session
        session(['last_visited' => $previousUrl]);

        // Redirect to the previous URL
        return redirect($previousUrl);
    }
}
