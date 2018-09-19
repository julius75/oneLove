<?php

namespace App\Http\Controllers;

// App\Mail\ReplyMail;

use App\StageOneProposal;
use App\User;
use App\Proposal;
use App\verifyUser;
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
        $posts=Proposal::orderBy('created_at','desc')->get();

        return view('admin.view_proposal',compact('posts'));
    }

    public function proposal_details($id){

        $post = Proposal::find($id);
        return view('admin.show_link_proposal')->with('post',$post);

    }

    public function dashboard(){
        return view('admin.index');
    }

    public function stage_two(){

        echo 2;
    }
    public function rejected(){

        $proposal=Proposal::where('status','rejected')->orderBy('created_at','desc')->paginate(10);
        return view('admin.rejected',compact('proposal'));
    }
    public function accepted(){

        $proposal=Proposal::where('status','accepted')->orderBy('created_at','desc')->paginate(10);
        return view('admin.rejected',compact('proposal'));
    }
    public function first_reject($id){

        $approved = Proposal::where('approve',false)->get();

            return view('admin.view.stage_one',compact('approved'));
     }



     public function reject_proposal(Request $request,$id){
    $proposal=Proposal::where('id',$id)->update([
        'status'=>'rejected'
    ]);
         //$email=Proposal::where('id',$id)->first();
         //$user_email=User::where('id',$email->user_id)->first();
         //$proposals=Proposal::where('id',$id)->first();
        // Mail::to($user_email->email)->send(new ReplyMail($proposals));
    //dd($proposal);
    if ($proposal){
        flash('Proposal rejected successfully')->success()->important();
        return back();
    }
    flash('An error occurred while trying to reject proposal')->error()->important();
    return back();


     }
     public function accept(Request $request,$id){
         $proposal=Proposal::where('id',$id)->update([
             'status'=>'accepted'
         ]);
         if ($proposal){
             $proposal=Proposal::where('id',$id)->first();
             $accepted=StageOneProposal::create([
                 'title'=>$proposal->title,
                 'proposal_id'=>$proposal->id,
                 'organization_name'=>$proposal->organization_name,
                 'address'=>$proposal->address,
                 'phone'=>$proposal->phone,
                 'email'=>$proposal->email,
                 'submitted_by_name'=>$proposal->submitted_by_name,
                 'title_organization'=>$proposal->title_organization,
                 'summary'=>$proposal->summary,
                 'background'=>$proposal->background,
                 'activities'=>$proposal->activities,
                 'budget'=>$proposal->budget,
             ]);
             if ($accepted){
                 flash('Proposal accepted successfully and moved to stage one')->success()->important();
                 return back();
             }
             flash('Proposal accepted successfully but an error occurred while trying to move it to step on! Please try again')->error()->important();
             return back();
         }
         flash('An error ocuured while trying to accept a proposal! Please try agin!')->error()->important();
         return back();


     }


    public function stage_one(){
        $one=StageOneProposal::orderBy('created_at','desc')->get();
        return view('proposal.stage_one_list',compact('one'));
    }

}
