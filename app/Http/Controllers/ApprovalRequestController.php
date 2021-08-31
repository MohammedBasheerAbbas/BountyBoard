<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApprovalRequest;
use App\Models\Task;
use Auth;

class ApprovalRequestController extends Controller
{
    public function index() 
    {
        $approvalRequests = ApprovalRequest::orderBy('created_at', 'desc')->get();
        return view('approvalrequests.index',[
            "approvalRequests"=> $approvalRequests,
        ]);
    }
    public function userIndex() 
    {
        $approvalRequests = Auth::user()->approvalrequests()->orderBy('created_at', 'desc')->get();
        return view('approvalrequests.userIndex',[
            "approvalRequests"=> $approvalRequests,
        ]);
    }

    public function makeRequest(Task $task){
       $user = Auth::user(); 
    //    return $user->approvalRequests()->get();
       if ($user->approvalRequests()->where('task_id', $task->id)->first())
            return redirect()->back()->withError("Approval Request Already Sent");
       $approvalRequest = new ApprovalRequest;
       $approvalRequest->task_id = $task->id;
       $approvalRequest->user_id = $user->id;
       $approvalRequest->status = 'pending';

       $approvalRequest->save();

       return redirect()->back()->withSuccess('Your Request Has Been Sent and is Waiting for Approval');
    }

    public function approveRequest( ApprovalRequest $approvalRequest){
        // return $approvalRequest;
        $approvalRequest->status = 'completed';
        $task = $approvalRequest->task()->first();
        $task->user_id = $approvalRequest->user_id;
        $task->status = 'completed';

        $approvalRequest->save();
        $task->save();

        return redirect()->back()->withSuccess('Task approved and completed Successfully');
    }

    public function unapproveRequest(ApprovalRequest $approvalRequest){
        $approvalRequest->status = 'pending';
        $task = $approvalRequest->task()->first();
        $task->status('claimed');

        $approvalRequest->save();
        $task->save();

        return redirect()->back()->withSuccess('Request unApproved Successfully');
    }

    public function delete(ApprovalRequest $approvalRequest){
        $approvalRequest->delete();
        return redirect()->back()->withSuccess('Request deleted Successfully');
    }
}
