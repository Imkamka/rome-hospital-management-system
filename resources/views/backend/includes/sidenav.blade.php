 <aside id="sidebar" x-transition.duration.200ms
     class="bg-white text-white  px-2 py-4 lg:relative absolute inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
     <div class="flex items-center justify-center mb-8 p-8">
         <img src="{{ asset('backend/assets/img/logo/logo.png') }}" alt="Logo" width="134px" height="25px">
     </div>
     <nav>
         <ul class="space-y-8 text-sm font-medium">
             <li><a wire:navigate href="{{ route('dashboard') }}"
                     class=" {{ Route::is('dashboard') ? 'text-blue-600' : '' }} text-gray-600 px-4 py-2 hover:text-blue-600">Dashboard</a>
             </li>

             @can('isAdmin', auth()->user())
                 <li>
                     <button @click="specialization = !specialization"
                         class="w-full text-left py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-blue-600 rounded flex justify-between {{ Route::is('admin.spec-create') || Route::is('admin.spec-manage') ? 'text-blue-600' : '' }}">
                         Specialization
                         <svg :class="{ 'rotate-180': specialization }" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                             </path>
                         </svg>
                     </button>

                     <ul x-show="specialization" x-transition @click.away="specialization = false" style="display:none"
                         class="space-y-1 pl-6 py-2">
                         <li><a wire:navigate href="{{ route('admin.spec-create') }}"
                                 class="block text-gray-600 py-2  hover:bg-gray-200 rounded hover:text-blue-600 {{ Route::is('admin.spec-create') ? 'text-blue-600' : '' }}">Add
                                 new
                             </a>
                         </li>
                         <li><a wire:navigate href="{{ route('admin.spec-manage') }}"
                                 class="block text-gray-600 py-2 hover:bg-gray-200 rounded hover:text-blue-600 {{ Route::is('admin.spec-manage') ? 'text-blue-600' : '' }}">Manage
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li><a wire:navigate href="{{ route('admin.doctors-list') }}"
                         class="{{ Route::is('admin.doctors-list') || Route::is('admin.doctors-detail') ? 'text-blue-600' : '' }} text-gray-600 px-4 py-2 hover:text-blue-600">Doctor's
                         List</a>
                 </li>
                 <li><a wire:navigate href="{{ route('admin.users-list') }}"
                         class="{{ Route::is('admin.users-list') ? 'text-blue-600' : '' }} text-gray-600 px-4 py-2 hover:text-blue-600">Patient
                         's
                         List</a></li>
                 <li><a wire:navigate href="{{ route('admin.doctors-report') }}"
                         class="{{ Route::is('admin.doctors-report') ? 'text-blue-600' : '' }} text-gray-600 px-4 py-2 hover:text-blue-600">Doctor
                         Reg Report</a>
                 </li>
                 <li><a wire:navigate href="{{ route('admin.web-page') }}"
                         class=" {{ Route::is('admin.web-page') || Route::is('patient.record-detail') ? 'text-blue-600' : '' }} text-gray-600 px-4 py-2 hover:text-blue-600">Website
                         Page</a>
                 </li>
             @endcan

             @can('isPatient', auth()->user())
                 <li><a wire:navigate href="{{ route('appointment.create') }}"
                         class="{{ Route::is('appointment.create') ? 'text-blue-600' : '' }} text-gray-600 px-4 py-2 hover:text-blue-600">Book
                         Appointment</a></li>
                 <li><a wire:navigate href="{{ route('appointment.history') }}"
                         class="{{ Route::is('appointment.history') ? 'text-blue-600' : '' }} text-gray-600 px-4 py-2 hover:text-blue-600">Appointment
                         History</a></li>
                 <li><a wire:navigate href="{{ route('patient.medical-record') }}"
                         class="{{ Route::is('patient.medical-record-detail') || Route::is('patient.medical-record') ? 'text-blue-600' : '' }} text-gray-600 px-4 py-2 hover:text-blue-600">Lab
                         Medical Record</a>
                 </li>
                 <li><a wire:navigate href="{{ route('patient.health-records') }}"
                         class=" {{ Route::is('patient.health-records') || Route::is('patient.record-detail') ? 'text-blue-600' : '' }} text-gray-600 px-4 py-2 hover:text-blue-600">Health
                         Records</a>
                 </li>
                 <li><a wire:navigate href="{{ route('patient.follow-up-notes') }}"
                         class=" {{ Route::is('patient.follow-up-notes') ? 'text-blue-600' : '' }} text-gray-600 px-4 py-2 hover:text-blue-600">Follow-up
                         Notes</a>
                 </li>
                 <li><a wire:navigate href="{{ route('patient.upcomming') }}"
                         class=" {{ Route::is('patient.upcomming') ? 'text-blue-600' : '' }} text-gray-600 px-4 py-2 hover:text-blue-600">Upcomming
                         Appointments</a>
                 </li>
             @endcan

             @can('isDoctor', auth()->user())
                 <li>
                     <button @click="labShow = !labShow"
                         class="w-full text-left py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-blue-600 rounded flex justify-between {{ Route::is('record.create') || Route::is('record.manage') || Route::is('record.view') ? 'text-blue-600' : '' }}">
                         Lab Records
                         <svg :class="{ 'rotate-180': labShow }" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                             </path>
                         </svg>
                     </button>

                     <ul x-show="labShow" x-transition @click.away="labShow = false" style="display:none"
                         class="space-y-1 pl-6 py-2">
                         <li><a wire:navigate href="{{ route('patient.manage') }}"
                                 class="block text-gray-600 py-2  hover:bg-gray-200 rounded hover:text-blue-600 {{ Route::is('record.create') ? 'text-blue-600' : '' }}">Add
                                 New
                                 Record</a>
                         </li>
                         <li><a wire:navigate href="{{ route('record.manage') }}"
                                 class="block text-gray-600 py-2 hover:bg-gray-200 rounded hover:text-blue-600 {{ Route::is('record.manage') ? 'text-blue-600' : '' }}">Manage
                                 Records</a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <button @click="open = !open"
                         class="w-full text-left py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-blue-600 rounded flex justify-between {{ Route::is('patient.manage') || Route::is('patient.create') ? 'text-blue-600' : '' }}">
                         Patients
                         <svg :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                             </path>
                         </svg>
                     </button>

                     <ul x-show="open" x-transition @click.away="open = false" style="display:none"
                         class="space-y-1 pl-6 py-2">
                         <li><a wire:navigate href="{{ route('patient.create') }}"
                                 class="block text-gray-600 py-2  hover:bg-gray-200 rounded hover:text-blue-600 {{ Route::is('patient.create') ? 'text-blue-600' : '' }}">New</a>
                         </li>
                         <li><a wire:navigate href="{{ route('patient.manage') }}"
                                 class="block text-gray-600 py-2 hover:bg-gray-200 rounded hover:text-blue-600 {{ Route::is('patient.manage') ? 'text-blue-600' : '' }}">Manage</a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <button @click="ap = !ap"
                         class="w-full text-left py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-blue-600 rounded flex justify-between {{ Route::is('appointment.all') || Route::is('appointment.approved') || Route::is('appointment.cancelled') || Route::is('appointment.recent') ? 'text-blue-600' : '' }}">
                         Appointments
                         <svg :class="{ 'rotate-180': ap }" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                             </path>
                         </svg>
                     </button>

                     <ul x-show="ap" x-transition @click.away="ap = false" style="display:none"
                         class="space-y-1 pl-6 py-2">
                         <li><a wire:navigate href="{{ route('appointment.recent') }}"
                                 class="block text-gray-600 py-2  hover:bg-gray-200 rounded hover:text-blue-600 {{ Route::is('appointment.recent') ? 'text-blue-600' : '' }}">New</a>
                         </li>
                         <li><a wire:navigate href="{{ route('appointment.approved') }}"
                                 class="block text-gray-600 py-2 hover:bg-gray-200 rounded hover:text-blue-600 {{ Route::is('appointment.approved') ? 'text-blue-600' : '' }}">Approved</a>
                         </li>
                         <li><a wire:navigate href="{{ route('appointment.cancelled') }}"
                                 class="block text-gray-600 py-2 hover:bg-gray-200 rounded hover:text-blue-600 {{ Route::is('appointment.cancelled') ? 'text-blue-600' : '' }}">Cancelled</a>
                         </li>
                         <li><a wire:navigate href="{{ route('appointment.all') }}"
                                 class="block text-gray-600 py-2 hover:bg-gray-200 rounded hover:text-blue-600 {{ Route::is('appointment.all') ? 'text-blue-600' : '' }}">All</a>
                         </li>
                     </ul>

                 </li>

                 <li><a wire:navigate href="{{ route('appointment.assign') }}"
                         class="text-gray-600 px-4 py-2 hover:text-blue-600 {{ Route::is('appointment.assign') ? 'text-blue-600' : '' }}">
                         Assign Appointment
                     </a>
                 </li>
                 <li><a wire:navigate href="{{ route('appointment.follow-up') }}"
                         class="text-gray-600 px-4 py-2 hover:text-blue-600 {{ Route::is('appointment.follow-up') ? 'text-blue-600' : '' }}">Follow-up</a>
                 </li>
                 <li><a wire:navigate href="{{ route('appointment.completed') }}"
                         class="text-gray-600 px-4 py-2 hover:text-blue-600 {{ Route::is('appointment.completed') ? 'text-blue-600' : '' }}">Completed</a>
                 </li>

                 <li><a wire:navigate href="{{ route('appointment.scheduled') }}"
                         class="text-gray-600 px-4 py-2 hover:text-blue-600 {{ Route::is('appointment.scheduled') ? 'text-blue-600' : '' }}">Scheduled
                         Appointments</a>

                 </li>
                 <li>
                     <button @click="rec = !rec"
                         class="w-full text-left py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-blue-600 rounded flex justify-between {{ Route::is('report.appointment') || Route::is('report.patient') ? 'text-blue-600' : '' }}">
                         Search Records by Date
                         <svg :class="{ 'rotate-180': rec }" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                             </path>
                         </svg>
                     </button>

                     <!-- Dropdown Links -->
                     <ul x-show="rec" x-transition @click.away="rec = false" style="display:none"
                         class="space-y-1 pl-6 py-2">
                         <li><a wire:navigate href="{{ route('report.patient') }}"
                                 class="block text-gray-600 py-2  hover:bg-gray-200 rounded hover:text-blue-600 {{ Route::is('report.patient') ? 'text-blue-600' : '' }}">Patient
                                 Records</a>
                         </li>
                         <li><a wire:navigate href="{{ route('report.appointment') }}"
                                 class="block text-gray-600 py-2 hover:bg-gray-200 rounded hover:text-blue-600 {{ Route::is('report.appointment') ? 'text-blue-600' : '' }}">Appointments
                                 Records</a>
                         </li>
                     </ul>
                 </li>
             @endcan
         </ul>
     </nav>
 </aside>
 {{-- <div x-data="{ isOpen: false }" class="flex h-screen">
     <!-- Sidebar -->
     <div :class="isOpen ? 'block' : 'hidden lg:block'"
         class="bg-gray-800 text-white w-64 space-y-6 px-2 py-4 lg:relative absolute inset-y-0 left-0 transform lg:translate-x-0 transition-transform duration-300">
         <h1 class="text-2xl font-bold text-center">Sidebar</h1>
         <nav>
             <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Dashboard</a>
             <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Settings</a>
             <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Profile</a>
             <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Logout</a>
         </nav>
     </div>

     <!-- Main Content -->
     <div class="flex-1 bg-gray-100">
         <!-- Topbar -->
         <div class="bg-gray-800 text-white px-4 py-3 flex justify-between lg:hidden">
             <button @click="isOpen = !isOpen" class="text-white focus:outline-none">
                 <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                 </svg>
             </button>
             <span class="font-bold text-xl">My App</span>
         </div>

         <!-- Content Area -->
         <div class="p-6">
             <h1 class="text-2xl font-bold">Welcome</h1>
             <p>This is the main content area.</p>
         </div>
     </div>
 </div> --}}
 {{-- <div class="flex h-screen">
     <!-- Sidebar -->
     <div id="sidebar"
         class="bg-gray-800 text-white w-64 space-y-6 px-2 py-4 lg:relative absolute inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
         <h1 class="text-2xl font-bold text-center">Sidebar</h1>
         <nav>
             <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Dashboard</a>
             <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Settings</a>
             <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Profile</a>
             <a href="#" class="block px-4 py-2 hover:bg-gray-700 rounded">Logout</a>
         </nav>
     </div>

     <!-- Main Content -->
     <div class="flex-1 bg-gray-100">
         <!-- Topbar -->
         <div class="bg-gray-800 text-white px-4 py-3 flex justify-between lg:hidden">
             <button id="toggleSidebar" class="text-white focus:outline-none">
                 <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                 </svg>
             </button>
             <span class="font-bold text-xl">My App</span>
         </div>

         <!-- Content Area -->
         <div class="p-6">
             <h1 class="text-2xl font-bold">Welcome</h1>
             <p>This is the main content area.</p>
         </div>
     </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
     $('#toggleSidebar').on('click', function() {
         $('#sidebar').toggleClass('-translate-x-full');
     });
 </script> --}}
 @push('scripts')
     <script>
         $('#toggleSidebar').on('click', function() {
             $('#sidebar').toggleClass('-translate-x-full');
         });
         $(document).on('click', function(e) {
             // Check if the click was outside the sidebar and toggle button
             if (!$(e.target).closest('#sidebar').length && !$(e.target).closest('#toggleSidebar').length) {
                 $('#sidebar').addClass('-translate-x-full');
             }
         });
     </script>
 @endpush
