<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\ClaimRequest;
use Auth;

class ClaimRequestController extends Controller
{

    public function index() 
    {
        $claimRequests = ClaimRequest::orderBy('created_at', 'desc')->get();
        return view('claimrequests.index',[
            "claimRequests"=> $claimRequests,
        ]);
    }

    public function userIndex() 
    {
        $claimRequests = Auth::user()->claimrequests()->orderBy('created_at', 'desc')->get();
        return view('claimrequests.userIndex',[
            "claimRequests"=> $claimRequests,
        ]);
    }

    public function makeRequest(Task $task){
       $user = Auth::user(); 
       if ($user->claimRequests()->where('task_id', $task->id))
            return redirect()->back()->withError("Task Already Claimed");
       $claimRequest = new ClaimRequest;
       $claimRequest->task_id = $task->id;
       $claimRequest->user_id = $user->id;
       $claimRequest->status = 'pending';

       $claimRequest->save();

       return redirect()->back()->withSuccess('Your Request Has Been Sent and is Waiting for Approval');
    }

    public function approveRequest( ClaimRequest $claimRequest){
        // return $claimRequest;
        $claimRequest->status = 'claimed';
        $task = $claimRequest->task()->first();
        $task->user_id = $claimRequest->user_id;
        $task->status = 'claimed';

        $claimRequest->save();
        $task->save();

        return redirect()->back()->withSuccess('Request Approved Successfully');
    }

    public function unapproveRequest(ClaimRequest $claimRequest){
        $claimRequest->status = 'pending';
        $task = $claimRequest->task()->first();
        $task->user_id = 0;

        $claimRequest->save();
        $task->save();

        return redirect()->back()->withSuccess('Request unApproved Successfully');
    }

    public function delete(ClaimRequest $claimRequest){
        $claimRequest->delete();
        return redirect()->back()->withSuccess('Request deleted Successfully');
    }
}
