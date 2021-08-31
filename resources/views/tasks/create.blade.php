@extends('layouts.main')

@section('content')
    <h1 class="text-indigo-700 p-5 mg-10 font-bold text-5xl	">Tasks</h1>

    <div class="p-6 m-2 bg-white shadow-md rounded-lg">
        <h2 class=" mg-4 font-bold text-2xl"> Add Task</h2>
        <form action="/admin/tasks" method="post">
          @csrf
            
            {{-- <label class="block text-gray-700 text-sm font-bold mb-2 mt-4" for="name">Task Name</label>
            <input class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" id="name" name="name" type="text" placeholder="Name">

            <label class="block text-gray-700 text-sm font-bold mb-2 mt-4" for="description">Description</label>
            <input class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" id="description" name="description" type="text" placeholder="description">

            <div class="mt-6">
                <label class="text-gray-700 text-sm font-bold mb-2 mt-4" for="description">Description</label>
                <input class="bg-gray-100 appearance-none border-2 border-gray-100 rounded md:w-5/12 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" type="text" name="budget" id="budget">
    
                <label class="text-gray-700 text-sm font-bold mb-2 mt-4 ml-5" for="description">Description</label>
                <input class="bg-gray-100 appearance-none border-2 border-gray-100 rounded md:w-5/12 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" type="text" name="budget" id="budget">
            </div> --}}


            <div class="grid grid-cols-6 gap-6 mt-4">
                    <div class="col-span-6 sm:col-span-6">
                      <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                      <input type="text" required name="title" id="title" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                    </div>
      
                    <div class="col-span-6 sm:col-span-6">
                      <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                      <textarea type="text" name="description" id="description" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500"> </textarea>
                    </div>
                    
                    <div class="col-span-6 sm:col-span-3">
                      <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                      <select id="department" required name="department" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                        @foreach ($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach

                      </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="budget" class="block text-sm font-medium text-gray-700">Budget</label>
                      <input type="number" required name="budget" id="budget"  class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                    </div>
      
      
                    <div class="col-span-6 sm:col-span-3">
                      <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                      <input type="datetime-local" required name="deadline" id="deadline" autocomplete="deadline" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                      <select id="status" name="status" class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500">
                          <option value="Available">Available</option>
                          <option value="Draft">Draft</option>
                        </select>
                    </div>
      

                </div>

            <button class="bg-indigo-700 px-5 py-2 rounded-lg text-indigo-50 mt-6 hover:bg-indigo-500 hover:shadow-md " type="submit"> Add + </button>
        </form>
    </div>

@endsection