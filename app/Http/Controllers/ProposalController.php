<?php

namespace App\Http\Controllers;

// App\Mail\ReplyMail;

use App\User;
use App\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


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

    public function index()
    {
        return view('home');
    }

//    validate data in proposal fields
    public function store(Request $request)
    {
            $save=Proposal::create($request->all());
            if($save){
                flash('Proposal successfully submitted')->success()->important();
                return back();
            }
            flash('An error occurred while trying to submit the proposal! Please try again')->error()->important();
            return back();
        }

        public function view_proposals(){
        return view('admin.view_proposal');
        }


}
