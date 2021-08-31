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
                <svg class="px-6" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 401.73 150.56"><defs><style>.cls-1{font-size:72px;font-family:Elephant-Regular, Elephant;}.cls-1,.cls-2{fill:#5d27e2;}</style></defs><title>bountyboard1</title><text class="cls-1" transform="translate(120.07 67.53)">Bounty </text><text class="cls-1" transform="translate(120.07 128.53)">Board</text><path class="cls-2" d="M145.63,313.21A2.71,2.71,0,0,0,144,312l-20.48-5.14a12.51,12.51,0,0,0,.61-2.33,12.66,12.66,0,0,0,7.3-5.48,11.33,11.33,0,0,0,1.29-9.16c-1.84-6.43-8.92-10.26-15.77-8.54a12.54,12.54,0,0,0-8.95,8.05,14.94,14.94,0,0,0-1.53.3,14,14,0,0,0-8.6,6.19A12.79,12.79,0,0,0,96.19,300l-37.82-9.5a2.89,2.89,0,0,0-2.07.26A2.59,2.59,0,0,0,55,292.33L30.55,377.91a2.42,2.42,0,0,0,.27,1.94A2.71,2.71,0,0,0,32.48,381l17.61,4.42v24A2.65,2.65,0,0,0,52.82,412h88.63a2.65,2.65,0,0,0,2.73-2.56V321.18l1.72-6a2.42,2.42,0,0,0-.27-1.94Zm-27.31-26.89a7.49,7.49,0,0,1,9.08,4.92,6.53,6.53,0,0,1-.74,5.27,7.33,7.33,0,0,1-4.5,3.24,7.81,7.81,0,0,1-5.63-.69,6.8,6.8,0,0,1,1.79-12.74Zm-15.77,12.15a8.56,8.56,0,0,1,4.95-3.71,11.44,11.44,0,0,0,.3,1.4,12.13,12.13,0,0,0,6,7.33A13.45,13.45,0,0,0,118.4,305a8.49,8.49,0,0,1-6.05,5.45,8.79,8.79,0,0,1-10.66-5.77A7.66,7.66,0,0,1,102.56,298.47Zm-43-2.34,36.65,9.2q.07.33.17.65a12.84,12.84,0,0,0,1.92,4l-2.86,2.68a2.45,2.45,0,0,0,0,3.62,2.86,2.86,0,0,0,3.86,0l2.87-2.69a14.87,14.87,0,0,0,7.9,2.26,15,15,0,0,0,3.66-.45,14.32,14.32,0,0,0,6.84-3.92l19.32,4.85-18.47,64.59L107,377.25a2.75,2.75,0,0,0-3.34,1.81l-3.88,13.57L36.54,376.76Zm56.72,88.77L106,390.47l2.17-7.61Zm22.41,22H55.56v-20L101,398.24A2.89,2.89,0,0,0,103,398l21.71-11.75a2.59,2.59,0,0,0,1.27-1.55l12.7-44.41v66.6Z" transform="translate(-30.46 -280.96)"/><path class="cls-2" d="M64.26,329.24l54,13.55a2.91,2.91,0,0,0,.71.09,2.71,2.71,0,0,0,2.64-1.9,2.55,2.55,0,0,0-1.93-3.13l-54-13.55a2.75,2.75,0,0,0-3.34,1.81,2.55,2.55,0,0,0,1.93,3.13Z" transform="translate(-30.46 -280.96)"/><path class="cls-2" d="M61.42,339.17l54,13.55a2.91,2.91,0,0,0,.71.09,2.71,2.71,0,0,0,2.64-1.9,2.55,2.55,0,0,0-1.93-3.13l-54-13.55A2.75,2.75,0,0,0,59.49,336a2.55,2.55,0,0,0,1.93,3.13Z" transform="translate(-30.46 -280.96)"/><path class="cls-2" d="M75.1,348,60,344.16A2.75,2.75,0,0,0,56.65,346a2.55,2.55,0,0,0,1.93,3.13l15.1,3.79a2.91,2.91,0,0,0,.71.09,2.71,2.71,0,0,0,2.64-1.9A2.55,2.55,0,0,0,75.1,348Z" transform="translate(-30.46 -280.96)"/><path class="cls-2" d="M86.26,350.85h0A2.56,2.56,0,1,0,89,353.41a2.65,2.65,0,0,0-2.73-2.56Z" transform="translate(-30.46 -280.96)"/></svg>

                <a href="/admin/departments" class="font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Departments</a>
                <a href="/admin/tasks" class="font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Tasks</a>
                    <a href="/admin/tasks/create" class="ml-8 font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">New Task</a>
                    <a href="/admin/tasks" class="ml-8 font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">View Tasks</a>
                    <a href="/admin/completed-tasks" class="ml-8 font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Completed Tasks</a>
                <a href="/admin/users" class="font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Users</a>
                <a href="/admin/requests" class="font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Claim Requests</a>
                <a href="/admin/approvals" class="font-bold text-lg mx-4  py-4 px-6 rounded-lg hover:bg-indigo-100 hover:text-indigo-700 transition duration-300 ease-in-out">Approval Requests</a>
            
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