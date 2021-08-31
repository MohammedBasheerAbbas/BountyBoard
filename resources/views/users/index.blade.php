@extends('layouts.main')

@section('content')
    <h1 class="text-indigo-700 p-5 mg-10 font-bold text-5xl	">Users</h1>


    <div class="p-6 m-2 bg-white shadow-md rounded-lg">
            <h2 class="mg-4 mb-6 font-bold text-2xl"> All Users </h2>
        
            <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Department
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Phone
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Claimed Tasks
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                  <span class="sr-only">Edit</span>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                              @foreach ($users as $user)
                              <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                    <div class="ml-4">
                                      <div class="text-sm font-medium text-gray-900">
                                        {{$user->name}}
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-900">{{$user->email}}</div>
                                  {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <a href="/admin/departments/{{$user->department()->first()->id}} "><div class="text-sm text-gray-900">{{$user->department()->first()->name}}</div></a> 
                                  {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-900">{{$user->phone}}</div>
                                  {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <a href="/admin/user/{{$user->id}}/tasks"><div class="text-sm text-gray-900">{{$user->tasks()->count()}}</div></a>
                                  {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <a href="/admin/users/{{$user->id}}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
    
    </div>
@endsection