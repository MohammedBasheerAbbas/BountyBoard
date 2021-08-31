@extends('layouts.main')

@section('content')
    <h1 class="text-indigo-700 p-5 mg-10 font-bold text-5xl	">Tasks</h1>

    <div class="p-6 m-2 bg-white shadow-md rounded-lg">
        <h2 class=" mg-4 font-bold text-2xl"> Add Task</h2>
        <form action="/admin/tasks/{{$task->id}}" method="post">
        @method("PUT")
        @csrf

            <div class="grid grid-cols-6 gap-6 mt-4">
                    <div class="col-span-6 sm:col-span-6">
                      <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                      <input type="text" required name="title" id="title" value="{{$task->title}}" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                    </div>
      
                    <div class="col-span-6 sm:col-span-6">
                      <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                      <textarea type="text" name="description" id="description" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">{{$task->description}}</textarea>
                    </div>
                    
                    <div class="col-span-6 sm:col-span-3">
                      <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                      <select id="department" required name="department" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                        @foreach ($departments as $department)
                            @if ($department->id == $task->department_id)
                            <option selected value="{{$department->id}}">{{$department->name}}</option>
                            @else
                            <option value="{{$department->id}}">{{$department->name}}</option>
                            @endif
                        @endforeach

                      </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="budget" class="block text-sm font-medium text-gray-700">Budget</label>
                      <input type="number" required name="budget" id="budget" value="{{$task->budget}}" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                    </div>
      
      
                    <div class="col-span-6 sm:col-span-3">
                      <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                      <input type="datetime-local" required name="deadline" id="deadline" value="{{$task->deadline()}}" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                      <select id="status" name="status"  class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                          <option selected value="{{$task->status}}">{{$task->status}}</option>
                          <div class="mt-1"></div>
                          <option value="Available">Available</option>
                          <option value="Draft">Draft</option>
                        </select>
                    </div>
      

                </div>

            <button class="bg-indigo-700 px-5 py-2 rounded-lg text-indigo-50 mt-6 hover:bg-indigo-500 hover:shadow-md " type="submit"> Edit </button>
        </form>
    </div>

    <div class="p-6 m-2 bg-white shadow-md rounded-lg">
            <h2 class=" mg-4 font-bold text-2xl"> Add Requirements</h2>

            <form action="/admin/requirements" method="post">
                @csrf
                <div class="grid grid-cols-6 gap-6 mt-4">

                        <div class="col-span-6 sm:col-span-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="content" id="content" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                        </div>
                        <input type="hidden" name="task_id" value="{{$task->id}}">
                        <div class="col-span-6 sm:col-span-2">
                                <button class="bg-indigo-700 px-5 py-2 rounded-lg text-indigo-50 mt-6 hover:bg-indigo-500 hover:shadow-md " type="submit"> Add </button>
                        </div>
                </div>
            </form>

            <div class="mt-6 py-4">
                    <h2 class=" mg-4 mb-4 font-bold text-2xl">Requirements</h2>
                <ul class="divide-y">
                  @foreach ($requirements as $requirement)    
                  <li class="group py-4 p-2 hover:bg-gray-50 flex justify-between "> {{$requirement->content}} <button class="hidden group-hover:inline">Delete</button> </li>
                  @endforeach
                    {{-- <li class="py-4 p-2 hover:bg-gray-50"> Task one</li>
                    <li class="py-4 p-2 hover:bg-gray-50"> Task one</li> --}}
                </ul>
            </div>
    </div>

    <div class="p-6 m-2 bg-white shadow-md rounded-lg">
            <h2 class=" mg-4 font-bold text-2xl"> Add Assets</h2>

            <form action="/admin/assets" method="post">
                @csrf
                <div class="grid grid-cols-6 gap-6 mt-4">

                        <div class="col-span-6 sm:col-span-2">
                        <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                        <input type="text" name="url" id="url" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <input type="text" name="description" id="description" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                        </div>
                        <input type="hidden" name="task_id" value="{{$task->id}}">
                        <div class="col-span-6 sm:col-span-2">
                                <button class="bg-indigo-700 px-5 py-2 rounded-lg text-indigo-50 mt-6 hover:bg-indigo-500 hover:shadow-md " type="submit"> Add </button>
                        </div>
                </div>
            </form>

            <div class="mt-6 py-4">
                    <h2 class=" mg-4 mb-4 font-bold text-2xl">Assets</h2>
                <ul class="divide-y">
                    @foreach ($assets as $asset)    
                    <li class="group py-4 p-2 hover:bg-gray-50 flex justify-between "> {{$asset->url}} <button class="hidden group-hover:inline">Delete</button> </li>
                    @endforeach
                </ul>
            </div>
    </div>

@endsection