<body class="bg-gray-100 flex">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">    
            <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <!-- Sidebar -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])
    <aside class="" 
     @include('layouts.navigation')
    <aside class="w-64 bg-gray-800 text-white min-h-screen">
       
             @include('layouts.sidebar')
            {{ config('app.name', 'BuildMate') }}
            <!-- You can replace this with your app name or logo -->
        </div>
           
       
    </aside>

    <!-- Main content beside sidebar -->
    <div class="flex-1 flex flex-col">

        <!-- Top Navbar -->
        <header class="bg-white shadow px-6 py-3 flex justify-between items-center">
            <h1 class="text-lg font-semibold">@yield('title', 'Dashboard')</h1>
        </header>

        <!-- Page Content -->
        <main class="p-6 overflow-x-auto">
            @yield('content')
        </main>
    </div>
</body>
