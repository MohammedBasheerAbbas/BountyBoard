<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    
    <title>Bounty Board</title>
</head>
<body class="box-border">
    
    <div class="h-full ">
        <div class="bg-gray-100 flex justify-between relative sm:absolute shadow z-20 sm:z-0 w-full">     
            <!-- mobile menu button -->
            <button class="mobile-menu-button p-4 focus:outline-none focus:bg-indigo-100">
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>

            <!-- logout -->
            <a href="{{ route('logout') }}" class="text-lg mx-4  py-4 px-6 rounded-lg hover:text-indigo-700 transition duration-300 ease-in-out" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                Logout
            </a>    
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            {{-- <a href="/logout" >Logout</a> --}}
          </div>

        <div class="sm:flex flex-auto min-h-screen h-full">
            <nav class="sidebar w-full sm:w-64 bg-gray-100 flex flex-col shadow z-10 pt-12 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
                <div class="my-6"></div>

                {{-- <a href="/user/departments" class="font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Departments</a> --}}
                <a href="/user/tasks" class="font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Tasks</a>
                <a href="/user/claimed" class="font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Claimed Tasks</a>
                    {{-- <a href="/user/tasks/create" class="ml-8 font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">New Task</a>
                    <a href="/user/tasks" class="ml-8 font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">View Tasks</a>
                <a href="/user/users" class="font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Users</a> --}}
                <a href="/user/requests" class="font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Claim Requests</a>
                <a href="/user/approvals" class="font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Approval Requests</a>
                <a href="/user/completed" class="font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Completed Tasks</a>
            
                        
            </nav>

            {{-- --------------------------------------------------------- --}}
            <div class="flex-auto min-h-screen bg-gray-50">
                @include('components.messages')
                <div class="container p-6 pt-12">
                   @yield('content')
                </div>
            
            </div>
        </div>
        
    </div>



</body>
</html>