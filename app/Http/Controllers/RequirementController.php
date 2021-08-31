<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Requirement;

use Illuminate\Http\Request;

class RequirementController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'content' => 'required',
        ]);
        
        $requirement = new Requirement; 
        $requirement->content = $request['content'];
        $requirement->status = 'pending';
        $requirement->task_id = $request['task_id'];
        $requirement->save();

        return redirect()->back()->withSuccess('Requirement Added Successfully');
    }

    public function update(Request $request, Task $task, Requirement $requirement){

        $requirement->status = $request['status'];
        $requirement->save();

        return redirect()->back()->withSuccess('Requirement Updated Successfully');
    }

    public function complete(Task $task, Requirement $requirement){

        $requirement->status = 'completed';
        $requirement->save();

        return redirect()->back()->withSuccess('Requirement Completed Successfully');
    }

    public function delete(Requirement $requirement){

        $requirement->delete();
        return redirect()->back()->withSuccess('Requirement Deleted Successfully');

    }
}
