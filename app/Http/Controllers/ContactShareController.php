<?php

namespace App\Http\Controllers;

use App\Mail\ContactShared;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ContactShareController extends Controller
{
    public function index()
    {
        $sharedContacts = auth()->user()->sharedContacts()
            ->with('user')
            ->get();

        $sharedContactsByUser = auth()->user()->contacts()
            ->with(['sharedWith' => fn ($query) => $query->withPivot('id')])
            ->get()
            ->filter(fn ($contact) => $contact->sharedWith->isNotEmpty());

        return view('contact-shares.index', compact(
            'sharedContacts',
            'sharedContactsByUser'
        ));
    }

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
        $contact = Contact::where('email', $data['contact_email'])
            ->where('user_id', auth()->id())
            ->first(['id', 'name']);

        $shareExists = $contact->sharedWith()
            ->wherePivot('user_id', $user->id)->first() != null;

        if ($shareExists) {
            return
                back()
                ->withInput($request->all())
                ->withErrors([
                    'contact_email' => "Contact {$contact->name} is already shared with {$user->email}",
                ]);
        }

        $contact->sharedWith()->attach($user->id);

        Mail::to($user)->send(new ContactShared(auth()->user()->email, $contact->name));

        return redirect()
            ->route('home')
            ->with('alert', [
                'message' => "Contact {$contact->name} successfully shared with {$user->email}",
                'type' => 'success',
            ]);
    }

    public function destroy(int $id)
    {
        $contactShare = DB::selectOne("SELECT * FROM contact_shares WHERE id = ?", [$id]);
        $contact = Contact::findOrFail($contactShare->contact_id);

        abort_if($contact->user_id !== auth()->id(), 403);

        $contact->sharedWith()->detach($contactShare->user_id);

        return redirect()
            ->route('contact-shares.index')
            ->with('alert', [
                'message' => "Contact {$contact->email} unshared",
                'type' => 'success',
            ]);
    }
}
