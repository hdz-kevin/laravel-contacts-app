<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $contacts = Contact::where('user_id', auth()->id())->get();
        // $contacts = auth()->user()->contacts()->get();

        return view('home', [
            'contacts' => auth()
                            ->user()
                            ->contacts()
                            ->latest() // sort by created_at
                            ->take(9)
                            ->get(),
        ]);
    }
}
