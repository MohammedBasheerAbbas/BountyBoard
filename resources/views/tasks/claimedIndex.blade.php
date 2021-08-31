@extends('layouts.user')

@section('content')
<h1 class="text-indigo-700 p-5 mg-10 font-bold text-5xl	">Claimed Tasks</h1>
<div class="grid grid-cols-6 gap-2 mt-4">
@if($tasks->count())
   @foreach ($tasks as $task)
   <div class="max-w-sm rounded overflow-hidden shadow-lg grid col-span-6 sm:col-span-2">
    <div class="px-6 py-4">
        <div class="">
            <div class="font-bold text-xl text-indigo-700 mb-2 hover:text-indigo-500"> <a href="/user/tasks/{{$task->id}}">{{$task->title}}</a> </div>
            <p class="text-gray-700 text-base mb-6">
              {{Str::limit($task->description, 80, '...')}}
            </p>
        </div>
      <div class="flex justify-between">
          <a class="border-2 font-bold border-indigo-700 px-5 py-2 rounded-lg text-indigo-700 hover:bg-indigo-700 hover:text-indigo-50 hover:shadow-md transition duration-300 ease-in-out" href="/user/tasks/{{$task->id}}">
            Read More
          </a>
          <span class="font-bold text-3xl text-indigo-700 mb-2"> ${{$task->budget}} </span>
      </div>
    </div>
    <div class="px-6 pt-4 pb-2">
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 hover:bg-indigo-100 hover:text-indigo-700 hover:shadow-sm transition duration-300 ease-in-out">{{$task->status}}</span>
    </div>
  </div>
   @endforeach
@else
  <div class="p-6 text-gray-900">
      <h3>No tasks Claimed yet..</h3>
  </div>
@endif
        



</div>

  @endsection