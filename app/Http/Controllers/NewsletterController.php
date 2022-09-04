<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        
        return view('welcome');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
  
        Newsletter::create($request->all());
  
        return redirect()->back()
                         ->with(['success' => 'Thank you for Subscribing. We will contact you shortly.']);
            
    }
}
