<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        // You can save this to database, send email, etc.
        // For now, just return success message

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}
