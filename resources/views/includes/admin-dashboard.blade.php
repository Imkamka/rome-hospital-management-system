 <section class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
     <a wire:navigate href="{{ route('admin.doctors-list') }}">
         <div class="bg-gray-200 text-center p-4 rounded-lg border hover:border-blue-600 transition">
             <h2 class="text-lg font-semibold text-gray-700">Total Doctors</h2>
             <p class="text-2xl font-bold text-yellow-600">{{ $total_doctor ?? 'NA' }}</p>
         </div>
     </a>
     <a wire:navigate href="{{ route('admin.spec-manage') }}">
         <div class="bg-gray-200 text-center p-4 rounded-lg border hover:border-blue-600 transition">
             <h2 class="text-lg font-semibold text-gray-700">Total Specialization</h2>
             <p class="text-2xl font-bold text-yellow-600">{{ $total_spec ?? 'NA' }}</p>
         </div>
     </a>

     <div class="bg-gray-200 text-center p-4 rounded-lg border hover:border-blue-600 transition">
         <h2 class="text-lg font-semibold text-gray-700">Total Admin Users</h2>
         <p class="text-2xl font-bold text-yellow-600">{{ $total_admin }}</p>
     </div>
     <a wire:navigate href="{{ route('admin.users-list') }}">
         <div class="bg-gray-200 text-center p-4 rounded-lg border hover:border-blue-600 transition">
             <h2 class="text-lg font-semibold text-gray-700">Total Patients</h2>
             <p class="text-2xl font-bold text-yellow-600">{{ $total_patient ?? 'NA' }}</p>
         </div>
     </a>

 </section>
