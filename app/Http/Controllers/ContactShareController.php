<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactShareController extends Controller
{
    public function create()
    {
        return view('contact-shares.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_email' => "required|email|exists:users,email|not_in:{$request->user()->email}",
            'contact_email' => [
                'required',
                'email',
                Rule::exists('contacts', 'email')->where('user_id', auth()->id()),
            ]
        ], [
            'user_email.not_in' => 'You cannot share a contact with yourself.',
            'contact_email.exists' => 'The contact you are trying to share does not exist.',
        ]);

        $user = User::where('email', $data['user_email'])->first(['id', 'email']);
        $contact = Contact::where('email', $data['contact_email'])->first(['id', 'name']);

        $shareExists = $contact->sharedWith()->wherePivot('user_id', $user->id)->first() != null;

        if ($shareExists) {
            return
                back()
                ->withInput($request->all())
                ->withErrors([
                    'contact_email' => "Contact {$contact->name} is already shared with {$user->email}",
                ]);
        }

        $contact->sharedWith()->attach($user->id);

        return redirect()
            ->route('home')
            ->with('alert', [
                'message' => "Contact {$contact->name} successfully shared with {$user->email}",
                'type' => 'success',
            ]);
    }
}
