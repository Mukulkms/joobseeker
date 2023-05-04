<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;
use Session;
use Illuminate\Validation\Rule;
class register extends Controller
{
    public function signup(){
        return view('layouts.register');
    }
    
   

    public function register(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'city' => 'required|string|max:200',
            'mobileNumber' => [
                'required',
                'string',
                Rule::unique('customer', 'mobilenumber')->ignore($request->customer),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('customer', 'email')->ignore($request->customer),
            ],
            'address' => 'required|string|max:200',
            'state' => 'required|string|max:200',
            'resume' => 'nullable|file',
        ]);
    
        // Check if a customer with the same mobile number or email already exists
        $existingCustomer = Customer::where('mobilenumber', $validatedData['mobileNumber'])
            ->orWhere('email', $validatedData['email'])
            ->first();
    
        if ($existingCustomer) {
            // Set an error message in the session
            Session::flash('error', 'Mobile number or email is already registered.');
    
            // Redirect back to the registration form with the old input
            return redirect()->back()->withInput();
        }
    
        // Create a new customer record
        $customer = new Customer();
        $customer->name = $validatedData['name'];
        $customer->city = $validatedData['city'];
        $customer->mobilenumber = $validatedData['mobileNumber'];
        $customer->email = $validatedData['email'];
        $customer->address = $validatedData['address'];
        $customer->state = $validatedData['state'];
    
        // Upload and store the resume if provided
        if ($request->hasFile('resume')) {
            $request->validate([
                'resume' => 'file|mimes:pdf,jpeg,jpg,png|max:5120', // Maximum file size: 5MB
            ]);
    
            $resumePath = $request->file('resume')->store('resumes');
            $customer->resume = $resumePath;
        }
    
        $customer->save();
    
        // Set a success message in the session
        Session::flash('success', 'Registration successful!');
    
        // Redirect to the home page
        return redirect('/');
    }
}    
