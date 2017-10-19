<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use App\Events\ContactMessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContactMessageController extends Controller
{
    public function getContactIndex()
    {
        return view( "frontend.others.contact");
    }

    public function postContactMessage(Request $req)
    {
        // validate input
        $this->validate($req, [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'subject' => 'required|max:120',
            'message' => 'required|min:10'
        ]);

        $message = new ContactMessage();
        $message->sender = $req['name'];
        $message->email = $req['email'];
        $message->subject = $req['subject'];
        $message->body = $req['message'];
        $message->save();

        // fire event
        // this event has two listeners, see listener directory
        event(new ContactMessageReceived($message));

        return redirect()->route('contact')->with(['success' => 'Send message successfully!']);
    }

    public function getAdminContactIndex()
    {
        $contact_messages = ContactMessage::orderBy('created_at','desc')->paginate(5);
        return view('admin.others.contact-message', ['contact_messages' => $contact_messages]);
    }

    public function getContactDelete($contact_message_id)
    {
        $contact_message = ContactMessage::find($contact_message_id);
        if (!$contact_message)
        {
            return Response::json(['message' => 'Contact not exist!'], 404);
        }
        // delete
        $contact_message->delete();
        return Response::json(['message' => 'Delete Contact successfully!'], 200);
    }
}
