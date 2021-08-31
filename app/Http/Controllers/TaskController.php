<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Department;
use App\Models\Requirment;
use App\Models\Asset;
use Auth;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(9);
        return view('tasks.index',[
            "tasks" => $tasks,
        ]);
    }

    /**
     * Display a listing of the resource for users.
     *
     * @return \Illuminate\Http\Response
     */
    public function userIndex()
    {
        $department = Auth::user()->department()->first();
        $tasks = $department->tasks()->orderBy('created_at', 'desc')->paginate(9);
        return view('tasks.userIndex',[
            "tasks" => $tasks,
        ]);
    }

    public function completedIndex()
    {
        $tasks = Task::where('status', 'completed')->orderBy('created_at', 'desc')->paginate(9);
        return view('tasks.index',[
            "tasks" => $tasks,
        ]);
    }
    

    public function claimedTasksIndex()
    {
        $tasks = Auth::user()->tasks()->orderBy('created_at', 'desc')->paginate(9);
        return view('tasks.claimedIndex',[
            "tasks" => $tasks,
        ]);
    }
    public function completedTasksIndex()
    {
        $tasks = Auth::user()->tasks()->where('status', 'completed')->orderBy('created_at', 'desc')->paginate(9);
        return view('tasks.completedIndex',[
            "tasks" => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('tasks.create', [
            "departments" => $departments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'budget' => 'required',
        ]);

        $task = new Task;
        $task->title = $request['title'];
        $task->description = $request['description'];
        $task->budget = $request['budget'];
        $task->deadline = $request['deadline'];
        $task->department_id = $request['department'];
        $task->status = $request['status'];
        $task->save();

        return redirect('/admin/tasks/'.$task->id.'/edit');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $requirements = $task->requirements()->orderBy('created_at','desc')->get();
        $assets = $task->assets()->orderBy('created_at','desc')->get();

        if($requirements->count()){
            $progress = floor($requirements->where('status','completed')->count() / $requirements->count() *100);
        }else{
            $progress = 0;
        }

        $comments = $task->comments()->orderBy('created_at','desc')->get();

        return view('tasks.show', [
            'task' => $task,
            "requirements" => $requirements,
            "assets" => $assets,
            "progress" => $progress,
            "comments" => $comments,
        ]);
    }


    public function userShow(Task $task)
    {
        if($task->status == 'claimed'){
            if($task->user_id !== Auth::user()->id)
                return redirect()->back()->withError("You're not allowed to view this page");
        }

        $requirements = $task->requirements()->orderBy('created_at','desc')->get();
        $assets = $task->assets()->orderBy('created_at','desc')->get();

        if($requirements->count()){
            $progress = floor($requirements->where('status','completed')->count() / $requirements->count() *100);
        }else{
            $progress = 0;
        }

        $comments = $task->comments()->orderBy('created_at','desc')->get();

        return view('tasks.userShow', [
            'task' => $task,
            "requirements" => $requirements,
            "assets" => $assets,
            "progress" => $progress,
            "comments" => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $departments = Department::all();
        $requirements = $task->requirements()->orderBy('created_at', 'desc')->get();
        $assets = $task->assets()->orderBy('created_at', 'desc')->get();
        return view('tasks.edit', [
            "departments" => $departments,
            "task" => $task,
            "requirements" => $requirements,
            "assets" => $assets,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'budget' => 'required',
        ]);
        
        $task->title = $request['title'];
        $task->description = $request['description'];
        $task->budget = $request['budget'];
        $task->deadline = $request['deadline'];
        $task->department_id = $request['department'];
        $task->status = $request['status'];
        $task->save();

        return redirect()->back()->withSuccess('Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
}
