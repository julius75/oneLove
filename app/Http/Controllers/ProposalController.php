<?php

namespace App\Http\Controllers;

// App\Mail\ReplyMail;

use App\Mail\AcceptedFinal;
use App\Mail\AcceptToStageTwo;
use App\Mail\ProposalAccepted;
use App\Mail\ProposalRejected;
use App\Mail\RejectedFinal;
use App\Mail\RejectStageOne;
use App\StageOneProposal;
use App\StageTwoProposal;
use App\User;
use App\Proposal;
use App\verifyUser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        $input = $request->input('btn');
        //$draft = $request->input('sub');
        if (isset($input)){
            return 123;
        }


//            $save=Proposal::create($request->all());
//            if($save){
//                flash('Proposal successfully submitted')->success()->important();
//                return back();
//            }
//            flash('An error occurred while trying to submit the proposal! Please try again')->error()->important();
//            return back();
        }



    public function view_proposals(){
        $posts=Proposal::orderBy('created_at','desc')->paginate(5);

        return view('admin.view_proposal',compact('posts'));
    }

    public function proposal_details($id){

        $post = Proposal::find($id);
        return view('admin.show_link_proposal')->with('post',$post);

    }

    public function dashboard(){
        return view('admin.index');
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
        $proposal=Proposal::where('id',$id)->first();
        Mail::to($proposal->email)->send(new ProposalRejected($proposal) );
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
                 Mail::to($proposal->email)->send(new ProposalAccepted($proposal) );
                 flash('Proposal accepted successfully and moved to stage one')->success()->important();
                 return back();
             }
             flash('Proposal accepted successfully but an error occurred while trying to move it to step on! Please try again')->error()->important();
             return back();
         }
         flash('An error occurred while trying to accept a proposal! Please try agin!')->error()->important();
         return back();
     }


    public function stage_one(){
        $one=StageOneProposal::orderBy('created_at','desc')->get();
        return view('proposal.stage_one_list',compact('one'));
    }


    public function details_stage_one($id){
        $ones = StageOneProposal::find($id);
        return view('proposal.show_stage_one_proposal')->with('ones',$ones);

    }

    public function reject_stage_one(Request $request,$id){
        $ones = StageOneProposal::where('id',$id)->update([
            'status'=>'rejected'
        ]);

        if ($ones){
            $ones = StageOneProposal::where('id',$id)->first();
            //to do
     Mail::to($ones->email)->send(new RejectStageOne($ones) );
            flash('Proposal rejected in stage one successfully')->success()->important();
            return back();
        }
        flash('An error occurred while trying to reject proposal')->error()->important();
        return back();

    }
    public function accept_stage_two(Request $request,$id){
        $ones=StageOneProposal::where('id',$id)->update([
            'status'=>'accepted'
        ]);
        if ($ones){
            $ones=StageOneProposal::where('id',$id)->first();
            $accepted=StageTwoProposal::create([
                'title'=>$ones->title,
                'prop_id'=>$ones->proposal_id,
                'organization_name'=>$ones->organization_name,
                'address'=>$ones->address,
                'phone'=>$ones->phone,
                'email'=>$ones->email,
                'submitted_by_name'=>$ones->submitted_by_name,
                'title_organization'=>$ones->title_organization,
                'summary'=>$ones->summary,
                'background'=>$ones->background,
                'activities'=>$ones->activities,
                'budget'=>$ones->budget,
            ]);
            if ($accepted){
                Mail::to($ones->email)->send(new AcceptToStageTwo($ones) );
                flash('Proposal accepted successfully and moved to stage two')->success()->important();
                return back();
            }
            flash('Proposal accepted successfully but an error occurred while trying to move it to step on! Please try again')->error()->important();
            return back();
        }
        flash('An error occurred while trying to accept a proposal! Please try agin!')->error()->important();
        return back();
    }

    public function stage_two(){
        $two=StageTwoProposal::orderBy('created_at','desc')->get();
        return view('proposal.stage_two_list',compact('two'));
    }
    public function details_stage_two($id){
        $twos = StageTwoProposal::find($id);
        return view('proposal.show_stage_two_proposal')->with('twos',$twos);

    }
    public function reject_stage_two(Request $request,$id){
        $twos = StageTwoProposal::where('id',$id)->update([
            'status'=>'rejected'
        ]);

        if ($twos){
            $twos = StageTwoProposal::where('id',$id)->first();
            //to do
            Mail::to($twos->email)->send(new RejectedFinal($twos) );
            flash('Proposal rejected in the final stage successfully')->success()->important();
            return back();
        }
        flash('An error occurred while trying to reject proposal')->error()->important();
        return back();

    }

    public function accept_stage_final(Request $request,$id){
        $twos = StageTwoProposal::where('id',$id)->update([
            'status'=>'accepted'
        ]);

        if ($twos){
            $twos = StageTwoProposal::where('id',$id)->first();
            //to do
            Mail::to($twos->email)->send(new AcceptedFinal($twos) );
            flash('Proposal accepted successfully')->success()->important();
            return back();
        }
        flash('An error occurred while trying to reject proposal')->error()->important();
        return back();

    }


    public function rejected(){
        $twos=StageTwoProposal::where('status','rejected')->orderBy('created_at','desc')->paginate(3);
        return view('admin.rejected',compact('twos'));
    }

    public function accepted(){
        $twos=StageTwoProposal::where('status','accepted')->orderBy('created_at','desc')->paginate(10);
        return view('admin.accepted_proposals',compact('twos'));
    }

}
