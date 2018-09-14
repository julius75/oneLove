<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

//    validate data in proposal fields
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
        Proposal::create($request->all());

        return redirect('/home');

        // The blog post is valid...
    }

    public function show()
    {
        $proposal = Proposal::all();
       // return view('products.index',compact('products',$products));
    }


}
