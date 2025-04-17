<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $contacts = Contact::where('user_id', auth()->id())->get();
        // $contacts = auth()->user()->contacts()->get();

        return view('contacts.index', ['contacts' => auth()->user()->contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        // Contact::create([...$data, 'user_id' => auth()->id()]);
        $contact = auth()->user()->contacts()->create($request->validated()); 

        return redirect()->route('home')->with('alert', [
            'message' => "Contact $contact->name successfully saved",
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        // autorizacion cutre
        // abort_if($contact->user_id !== auth()->id(), Response::HTTP_FORBIDDEN);

        // autorizacion con Gates
        // Gate::authorize('show-contact', $contact);

        // autorizacion con policies
        $this->authorize('view', $contact);

        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $this->authorize('update', $contact);

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContactRequest $request, Contact $contact)
    {
        $this->authorize('update', $contact);

        // $data = $request->validate([
        //     'name' => 'required',
        //     'phone_number' => 'required|digits:9',
        //     'email' => 'required|email',
        //     'age' => 'required|numeric|min:2|max:255',
        // ]);

        $contact->update($request->validated());

        return redirect()->route('home')->with('alert', [
            'message' => "Contact $contact->name successfully updated",
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);

        $contact->delete();

        return back()->with('alert', [
            'message' => "Contact $contact->name successfully deleted",
            'type' => 'success',
        ]);
    }
}
