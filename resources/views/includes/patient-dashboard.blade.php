 <div class="container mx-auto space-y-8">
     <div class="text-center">
         <h1 class="text-2xl font-semibold text-gray-800">Patient Dashboard</h1>
         <p class="text-gray-600">Access your follow-up notes, health records, and upcoming appointments.</p>
     </div>

     <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

         <div class="bg-white p-6 rounded-lg shadow-md border hover:border-blue-600 transition cursor-pointer">
             <h2 class="text-xl font-bold text-blue-600 mb-4">Follow-Up Notes</h2>
             <ul class="space-y-4">
                 @if ($followup->isNotEmpty())
                     @foreach ($followup as $list)
                         <li class="border-b pb-4">
                             <h3 class="text-sm font-semibold text-gray-700">Follow-Up Appointment: <span
                                     class="text-gray-500">{{ $list->follow_up_date }}</span></h3>
                             <p class="text-sm text-gray-600 mt-2">{{ $list->follow_up_notes ?? 'NA' }}</p>
                         </li>
                     @endforeach
                 @else
                     <li class="border-b pb-4">
                         <p class="text-sm text-gray-600">No follow up appointments available.
                         </p>
                     </li>
                 @endif
             </ul>
             <a wire:navigate href="{{ route('patient.follow-up-notes') }}"
                 class="block text-blue-500 text-sm mt-4 hover:underline">View all follow-up
                 notes</a>
         </div>

         <div class="bg-white p-6 rounded-lg shadow-md border hover:border-blue-600 transition cursor-pointer">
             <h2 class="text-xl font-bold text-blue-600 mb-4">Health Records</h2>
             <ul class="space-y-4">
                 @forelse ($health_records as $record)
                     <li class="border-b pb-4">
                         <h3 class="text-sm font-semibold text-gray-700">Prescription Date: <span
                                 class="text-gray-500">{{ $record->prescription_date }}</span></h3>
                         <p class="text-sm text-gray-600 mt-2">{{ $record->prescription }}</p>
                     </li>
                 @empty
                     <li class="border-b pb-4">
                         <p class="text-sm text-gray-600">No health record available.
                         </p>
                     </li>
                 @endforelse
             </ul>
             <a wire:navigate href="{{ route('patient.health-records') }}"
                 class="block text-blue-500 text-sm mt-4 hover:underline">View complete health
                 history</a>
         </div>

     </div>
     <!-- Upcoming Appointments Section -->
     <div class="bg-white p-6 rounded-lg shadow-md border hover:border-blue-600 transition cursor-pointer">
         <h2 class="text-xl font-bold text-blue-600 mb-4">Upcoming Appointments </h2>
         <ul class="space-y-4">
             @if ($upcomming->isNotEmpty())
                 @foreach ($upcomming as $list)
                     <li class="border-b pb-4">
                         <h3 class="text-sm font-semibold text-gray-700">Date: <span
                                 class="text-gray-500">{{ $list->appointment_date ?? 'NA' }}</span>
                         </h3>
                         <p class="text-sm text-gray-600">{{ $list->remark ?? 'NA' }}.</p>
                     </li>
                 @endforeach
             @else
                 <li class="border-b pb-4">
                     <p class="text-sm text-gray-600">No upcomming appointments available.
                     </p>
                 </li>
             @endif
         </ul>
         <a wire:navigate href="{{ route('patient.upcomming') }}"
             class="block text-blue-500 text-sm mt-4 hover:underline">View all upcoming
             appointments</a>
     </div>
 </div>
