<x-app-layout>
    {{-- We won't use the default header slot from app-layout --}}
    {{-- <x-slot name="header"> ... </x-slot> --}}

    <div class="flex h-screen bg-gray-100 dark:bg-gray-900">

        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-purple-600 to-purple-700 text-white flex flex-col fixed inset-y-0 left-0 z-30">
            <!-- Logo/Header -->
            <div class="flex items-center justify-center h-20 border-b border-purple-800">
                {{-- Replace with your actual logo SVG or image --}}
                <svg class="h-10 w-10 mr-2" fill="currentColor" viewBox="0 0 20 20"> <path fill-rule="evenodd" d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 00-.606.92l.763 8a1 1 0 00.999.97h13.268a1 1 0 00.999-.97l.763-8a1 1 0 00-.606-.92l-7-3zM10 6a1 1 0 011 1v.01a1 1 0 11-2 0V7a1 1 0 011-1zm.01 4a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                <span class="text-2xl font-semibold">School Portal</span>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">
                {{-- Active link style: bg-purple-800 --}}
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-md bg-purple-800 hover:bg-purple-800">
                    {{-- Replace with Heroicon or SVG --}}
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path></svg>
                    Dashboard
                </a>
                 <!-- Inside the <nav> in the sidebar -->
                 <a href="{{ route('enrollment.create') }}" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-md hover:bg-purple-800 {{ request()->routeIs('enrollment.create') ? 'bg-purple-800' : '' }}">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Enrollment
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-md hover:bg-purple-800">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    Payment Info
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-md hover:bg-purple-800">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Registration
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-md hover:bg-purple-800">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Courses
                </a>
                 <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-md hover:bg-purple-800">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                    Drop Semester
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-md hover:bg-purple-800">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Result
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-md hover:bg-purple-800">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-5-5m0 0l5-5m-5 5h12"></path></svg> {{-- Approximation for Notice --}}
                    Notice
                </a>
                 <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium rounded-md hover:bg-purple-800">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Schedule
                </a>
               
                {{-- Add other links from image --}}
            </nav>

            <!-- Logout Button -->
             <div class="px-4 py-4 border-t border-purple-800">
                 <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-md text-purple-300 hover:bg-purple-800 hover:text-white">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                     </a>
                 </form>
             </div>
        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden ml-64"> {{-- Add ml-64 to offset sidebar width --}}
            <!-- Top bar -->
            <header class="bg-white dark:bg-gray-800 shadow-md h-16 flex items-center justify-between px-6">
                 <!-- Search Bar -->
                <div class="relative w-full max-w-md">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </span>
                    <input class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" type="search" placeholder="Search">
                </div>

                 <!-- User Profile Dropdown -->
                <div class="flex items-center">
                    {{-- Use Breeze's dropdown component --}}
                     <x-dropdown align="right" width="48">
                         <x-slot name="trigger">
                             <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                  {{-- Placeholder Avatar - Replace with image if available --}}
                                 <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-purple-200 mr-2">
                                     <span class="text-sm font-medium leading-none text-purple-800">{{ substr($user->student->first_name ?? 'U', 0, 1) }}{{ substr($user->student->last_name ?? 'N', 0, 1) }}</span>
                                 </span>
                                 <div>
                                     <div>{{ $user->student->first_name ?? '' }} {{ $user->student->last_name ?? $user->name }}</div>
                                     <div class="text-xs text-gray-400">{{ ucfirst($user->student->year_level ?? 'Student') }}</div> {{-- Display year level --}}
                                 </div>
                                 <div class="ms-1">
                                     <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                 </div>
                             </button>
                         </x-slot>

                         <x-slot name="content">
                             <x-dropdown-link :href="route('profile.edit')">
                                 {{ __('Profile') }}
                             </x-dropdown-link>

                             <!-- Authentication -->
                             <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                                 <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                     {{ __('Log Out') }}
                                 </x-dropdown-link>
                             </form>
                         </x-slot>
                     </x-dropdown>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900 p-6">
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-lg shadow-md p-6 mb-6 text-white relative overflow-hidden">
        <div class="relative z-10">
            <div class="text-sm text-purple-200 mb-2">{{ \Carbon\Carbon::now()->format('F j, Y') }}</div>
            <h1 class="text-3xl font-bold mb-1">Welcome back, {{ $user->student->first_name ?? $user->name }}!</h1>
            {{-- Add this line for Student ID --}}
            <p class="text-sm text-purple-100 mb-2">Student ID: {{ $user->student->student_id_number ?? 'N/A' }}</p>
            {{-- End of added line --}}
            <p class="text-purple-100">Always stay updated in your student portal.</p>
        </div>
        {{-- Decorative elements --}}
        <div class="absolute top-0 right-0 -mt-4 -mr-4 opacity-30 z-0">
            <svg class="w-48 h-48 text-indigo-400" fill="currentColor" viewBox="0 0 200 200"> <path d="M 50 0 L 100 100 L 0 100 Z" /> </svg>
        </div>
        <div class="absolute bottom-0 right-10 mb-2 opacity-40 z-0">
             <svg class="w-32 h-32 text-purple-300" fill="currentColor" viewBox="0 0 200 200"> <circle cx="100" cy="100" r="80" /> </svg>
        </div>
    </div>

                <!-- Grid for Sections -->
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">

                     <!-- Finance Section -->
                     <div class="col-span-1 md:col-span-3 lg:col-span-2">
                         <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-3">Finance</h2>
                         <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                             {{-- Card 1: Total Payable --}}
                             <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow flex flex-col items-center">
                                <svg class="h-12 w-12 text-purple-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg> {{-- Placeholder Icon --}}
                                 <div class="text-2xl font-bold text-gray-800 dark:text-white">$ 10,000</div>
                                 <div class="text-sm text-gray-500 dark:text-gray-400">Total Payable</div>
                             </div>
                             {{-- Card 2: Total Paid --}}
                              <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow flex flex-col items-center border-2 border-purple-500"> {{-- Highlighted Card --}}
                                 <svg class="h-12 w-12 text-green-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0c-1.11 0-2.08-.402-2.599-1M12 16v1m0-8a3 3 0 00-3 3h6a3 3 0 00-3-3z"></path></svg> {{-- Placeholder Icon --}}
                                 <div class="text-2xl font-bold text-gray-800 dark:text-white">$ 5,000</div>
                                 <div class="text-sm text-gray-500 dark:text-gray-400">Total Paid</div>
                             </div>
                             {{-- Card 3: Others --}}
                              <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow flex flex-col items-center">
                                  <svg class="h-12 w-12 text-blue-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg> {{-- Placeholder Icon --}}
                                 <div class="text-2xl font-bold text-gray-800 dark:text-white">$ 300</div>
                                 <div class="text-sm text-gray-500 dark:text-gray-400">Others</div>
                             </div>
                         </div>
                     </div>

                     <!-- Course Instructors Section -->
                     <div class="col-span-1 md:col-span-1 lg:col-span-1">
                         <div class="flex justify-between items-center mb-3">
                            <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200">Course Instructors</h2>
                            {{-- <a href="#" class="text-sm text-purple-600 hover:underline">See all</a> --}}
                         </div>
                         <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow flex justify-around items-center">
                            {{-- Placeholder avatars - Replace with actual data/images later --}}
                            <img class="h-12 w-12 rounded-full object-cover" src="https://via.placeholder.com/100/FF7E7E/FFFFFF?text=I1" alt="Instructor 1">
                            <img class="h-12 w-12 rounded-full object-cover" src="https://via.placeholder.com/100/7E8AFF/FFFFFF?text=I2" alt="Instructor 2">
                            <img class="h-12 w-12 rounded-full object-cover" src="https://via.placeholder.com/100/808080/FFFFFF?text=I3" alt="Instructor 3">
                         </div>
                     </div>

                     <!-- Daily Notice Section -->
                      <div class="col-span-1 md:col-span-2 lg:col-span-1">
                         <div class="flex justify-between items-center mb-3">
                            <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200">Daily Notice</h2>
                            <a href="#" class="text-sm text-purple-600 hover:underline">See all</a>
                         </div>
                         <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow space-y-3">
                             {{-- Notice Item 1 --}}
                             <div>
                                 <h3 class="font-semibold text-sm text-gray-800 dark:text-gray-100">Prelim payment due</h3>
                                 <p class="text-xs text-gray-500 dark:text-gray-400 truncate">Sorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                 <a href="#" class="text-xs text-purple-600 hover:underline">See more</a>
                             </div>
                              {{-- Notice Item 2 --}}
                             <div>
                                 <h3 class="font-semibold text-sm text-gray-800 dark:text-gray-100">Exam schedule</h3>
                                 <p class="text-xs text-gray-500 dark:text-gray-400 truncate">Norem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                  <a href="#" class="text-xs text-purple-600 hover:underline">See more</a>
                             </div>
                         </div>
                     </div>
                </div>


                <!-- Enrolled Courses Section -->
                 <div>
                     <div class="flex justify-between items-center mb-3">
                        <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200">Enrolled Courses</h2>
                        <a href="#" class="text-sm text-purple-600 hover:underline">See all</a>
                     </div>
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                         {{-- Course Card 1 --}}
                         <div class="bg-gradient-to-r from-purple-100 to-indigo-100 dark:from-purple-900 dark:to-indigo-900 p-5 rounded-lg shadow flex justify-between items-center">
                             <div>
                                 <h3 class="font-semibold text-gray-800 dark:text-gray-100">Object oriented programming</h3>
                                 {{-- Add details like units, instructor later --}}
                                 <button class="mt-3 px-4 py-1.5 bg-purple-600 text-white text-xs font-medium rounded-full hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">View</button>
                             </div>
                             {{-- Placeholder Icon --}}
                             <svg class="h-16 w-16 text-purple-400 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                         </div>
                          {{-- Course Card 2 --}}
                         <div class="bg-gradient-to-r from-purple-100 to-indigo-100 dark:from-purple-900 dark:to-indigo-900 p-5 rounded-lg shadow flex justify-between items-center">
                             <div>
                                 <h3 class="font-semibold text-gray-800 dark:text-gray-100">Fundamentals of database systems</h3>
                                 <button class="mt-3 px-4 py-1.5 bg-purple-600 text-white text-xs font-medium rounded-full hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">View</button>
                             </div>
                             {{-- Placeholder Icon --}}
                             <svg class="h-16 w-16 text-indigo-400 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 7v10m16-10v10M4 7h16M4 17h16M10 7v10m4-10v10M4 7a2 2 0 012-2h12a2 2 0 012 2M4 17a2 2 0 002 2h12a2 2 0 002-2"></path></svg>
                         </div>
                          {{-- Add more course cards as needed --}}
                     </div>
                 </div>

            </main>
        </div>
    </div>

</x-app-layout>