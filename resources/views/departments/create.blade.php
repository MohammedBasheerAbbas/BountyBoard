@extends('layouts.main')

@section('content')
    <h1 class="text-indigo-700 p-5 mg-10 font-bold text-5xl	">Departments</h1>

    <div class="p-6 m-2 bg-white shadow-md rounded-lg">
        <h2 class=" mg-4 font-bold text-2xl"> Add Department</h2>
        <form action="/admin/departments" method="post">
            @csrf
            <label class="block text-gray-700 text-sm font-bold mb-2 mt-4" for="name">Department Name</label>
            <input class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" required id="name" name="name" type="text" placeholder="Name">

            <label class="block text-gray-700 text-sm font-bold mb-2 mt-4" for="description">Description</label>
            <input class="bg-gray-100 appearance-none border-2 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500" id="description" name="description" type="text" placeholder="description">

            <button class="bg-indigo-700 px-5 py-2 rounded-lg text-indigo-50 mt-4 hover:bg-indigo-500 hover:shadow-md " type="submit"> Add + </button>
        </form>
    </div>

    <div class="p-6 m-2 bg-white shadow-md rounded-lg">
            <h2 class="mg-4 mb-6 font-bold text-2xl"> Departments </h2>
        
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
                                  Description
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                  <span class="sr-only">Edit</span>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                              @foreach ($departments as $department)
                              <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                    <div class="ml-4">
                                      <div class="text-sm font-medium text-gray-900">
                                        {{$department->name}}
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="text-sm text-gray-900">{{$department->description}}</div>
                                  {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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