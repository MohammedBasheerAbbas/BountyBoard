@extends('layouts.main')

@section('content')
    <h1 class="text-indigo-700 p-5 mg-10 font-bold text-5xl	">Approval Requests</h1>


    <div class="p-6 m-2 bg-white shadow-md rounded-lg">
            <h2 class="mg-4 mb-6 font-bold text-2xl"> All Requests </h2>
        
            <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Task
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  User
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Status
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                  <span class="sr-only">Approve</span>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @if($approvalRequests->count())
                              @foreach ($approvalRequests  as $request)
                              <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                    <div class="ml-4">
                                      <div class="text-sm font-medium text-gray-900">
                                        <a href="/admin/tasks/{{$request->task()->first()->id}}"> {{$request->task()->first()->title}} </a> 
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <a href="/admin/users/{{$request->user()->first()->id}}"><div class="text-sm text-gray-900">{{$request->user()->first()->name}}</div></a>
                                  {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$request->status}}</div>
                                  {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <a href="/admin/approvals/{{$request->id}}/approve" class="text-indigo-600 hover:text-indigo-900">Approve</a>
                                </td>
                              </tr>
                              @endforeach
                            @else
                              <div class="p-6 text-gray-900 text-xl">
                                  There are no Requests Currently..
                              </div>
                            @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
    
    </div>
@endsection