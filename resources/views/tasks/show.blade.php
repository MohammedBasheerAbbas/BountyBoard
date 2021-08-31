@extends('layouts.main')

@section('content')
<h1 class="text-indigo-700 p-5 mg-10 font-bold text-5xl	">Task</h1>

  
   <div class="p-6 m-2 bg-white shadow-sm rounded-lg">
    <div class="px-6 py-4">
        <div class="">
            @if ($task->status == 'claimed')
                <div class="text-gray-600 font-semibold">
                    Task Claimed by: <a class="text-indigo-700" href="/users/{{$task->user_id}}"> {{$task->user()->first()->name}} </a>
                </div>   
            @elseif($task->status == 'completed')       
                <div class="bg-green-50 text-gray-600 font-semibold p-6 mb-5">
                    Task Completed by: <a class="text-indigo-700" href="/users/{{$task->user_id}}"> {{$task->user()->first()->name}} </a>
                </div>         
            @endif
            <div class="text-right">
                <a href="/admin/tasks/{{$task->id}}/edit" class=" border-2 font-bold border-indigo-700 px-5 py-2 rounded-lg text-indigo-700 hover:bg-indigo-700 hover:text-indigo-50 hover:shadow-md transition duration-300 ease-in-out"> Edit</a>
            </div>
            <div class="font-bold text-xl mb-2 mt-2"> {{$task->title}} </div>
            <p class="text-gray-700 text-base mb-6">
              {{$task->description}}
            </p>
        </div>
      <div class="flex justify-between">
          {{-- <a class="border-2 font-bold border-indigo-700 px-5 py-2 rounded-lg text-indigo-700 hover:bg-indigo-700 hover:text-indigo-50 hover:shadow-md transition duration-300 ease-in-out" href="#">
            Read More
          </a> --}}
          <span class="font-bold text-3xl text-indigo-700 mb-2"> ${{$task->budget}} </span>
      </div>
      <div class="font-semibold text-red-400 py-2">
          Deadline: {{\Carbon\Carbon::parse($task->deadline)->format('Y-m-d | h:i A')}}
      </div>
    </div>
    <div class="px-6 pt-4 pb-2">
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 hover:bg-indigo-100 hover:text-indigo-700 hover:shadow-sm transition duration-300 ease-in-out">{{$task->status}}</span>
      <a href="/admin/departments/{{$task->department()->first()->id}} "> <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 hover:bg-indigo-100 hover:text-indigo-700 hover:shadow-sm transition duration-300 ease-in-out">{{$task->department()->first()->name}}</span></a>
    </div>

    <div class="font-bold text-xl mb-2  mt-4"> Requirements </div>

    <ul class="divide-y">
        @foreach ($requirements as $requirement)    
        <li class=" py-4 p-2 hover:bg-gray-50 font-semibold "> {{$requirement->content}}  @if($requirement->status == "completed") <span class="inline ml-2 text-green-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /> </svg> </span>
           @endif </li>
        @endforeach
    </ul>

        

    <div class="relative pt-1 mt-4 mb-4">
        <div class="flex mb-3 items-center justify-between">
            <div>
            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-indigo-600 bg-indigo-200">
                Progress
            </span>
            </div>
            <div class="text-right">
            <span class="text-xs font-semibold inline-block text-indigo-600">
                {{$progress}}%
            </span>
            </div>
        </div>
        <div class="overflow-hidden h-3 mb-4 text-xs flex rounded bg-indigo-200">
            <div style="width:{{$progress}}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gradient-to-r from-indigo-600 to-indigo-400"></div>
        </div>
    </div>


        <h2 class="mt-8 mb-2 font-bold text-2xl">Assets</h2>
        <ul class="divide-y">
            @foreach ($assets as $asset)    
                <li class="group py-4 p-2 hover:bg-gray-50"> <a class="font-semibold underline text-indigo-700 hover:text-indigo-500" href="{{$asset->url}}"> {{$asset->url}} </a> <span class="block">{{$asset->description}} </span></li>
            @endforeach
        </ul>

  </div>

  <div class="p-6 m-2 bg-white shadow-sm rounded-lg">
  
    <div>
        <h2 class="mt-8 mb-2 font-bold text-2xl">Make a comment: </h2>

        <form action="/tasks/{{$task->id}}/comments" method="post">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-4">
                    <textarea name="content" rows=6 id="content" placeholder="Type your comment here..." class="mt-1 bg-gray-100 block appearance-none border-2 border-gray-100 rounded py-2 px-4 text-gray-700 leading-tight w-full focus:outline-none focus:bg-white focus:border-indigo-500"></textarea>
                   <div class="text-right"><button type="submit" class=" border-2 font-bold border-indigo-700 px-5 py-2 rounded-lg text-indigo-700 hover:bg-indigo-700 hover:text-indigo-50 hover:shadow-md transition duration-300 ease-in-out mt-4"> Submit</button></div> 
                </div>
            </div>
        </form>

    </div>

    <div>
        <h2 class="mt-8 mb-2 font-bold text-2xl">Comments: </h2>

        <ul>
            @if ($comments->count())
                @foreach ($comments as $comment)    
                <li class="comment mt-2 mb-2">
                    <div class="shadow-sm rounded p-6 border-l-4 border-indigo-600">
                      <div class="flex justify-between"> 
                        <h3 class="mt-2 mb-2 font-semibold text-xl"> {{$comment->author()->first()->name}} </h3>  
                        <div class="text-gray-400"> {{$comment->created_at->diffForHumans()}} </div>
                      </div> 
                       
                        {{$comment->content}}
                    </div>
                </li>
                @endforeach
            @else
            <h3 class="mt-4 mb-4 text-gray-400 text-lg"> There are no comments made here yet.. </h3>
            @endif
{{-- 
            <li class="comment mt-2 mb-2">
                <div class="shadow-sm rounded p-6 border-l-4 border-indigo-600">
                   <h3 class="mt-2 mb-2 font-semibold text-xl">  Zaid Qasim </h3>
                    content
                </div>
            </li> --}}


        </ul>
    </div>
  </div>


  @endsection