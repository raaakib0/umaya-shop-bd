<?php
namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validate= $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

       ContactMessage::create($validate);

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }

    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.contact-messages',compact('messages'));
    }
}
