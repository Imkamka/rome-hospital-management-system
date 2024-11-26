  <header class="flex justify-between items-center mb-6">
      <div class="flex space-x-2 items-center">
          <button id="toggleSidebar" @click="showSideNav= !showSideNav " class="md:hidden text-2xl">☰</button>
          <a wire:navigate href="{{ route('dashboard') }}">
              <h1 class="text-xl font-semibold text-gray-700">
                  {{ auth()->user()->role === 'Admin' ? ' Admin' : '' }}
                  Dashboard
                  {{ auth()->user()->role === 'Doctor' ? ' Médico' : '' }}
              </h1>
          </a>
      </div>
      <div x-data="{ show: false }" class="flex items-center space-x-4">
          @if (auth()->user()->role === 'Admin')
              <div x-data="{
                  isOpen: false,
              }" class="relative inline-block text-left">
                  <!-- Notification Bell -->
                  @livewire('backend.admin.notifications.no-bell')
                  <!-- Dropdown Menu -->
                  <div x-show="isOpen" style="display: none" @click.away="isOpen = false"
                      class="absolute right-0 z-10 mt-2 w-64 bg-white divide-y divide-gray-100 rounded-lg shadow-lg dark:bg-gray-700">
                      <div class="p-4">
                          <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-200">
                              Notifications({{ auth()->user()->notifications->whereNull('read_at')->count() }})</h3>
                      </div>
                      <ul class="max-h-60 overflow-y-auto">
                          @livewire('backend.admin.notifications.notifications-component')
                          {{-- @livewire('backend.admin.notifications.view-notification') --}}
                      </ul>
                      <div class="p-4 border-t border-gray-200 dark:border-gray-600">
                          @livewire('backend.admin.notifications.mark-all-as-read')
                      </div>
                  </div>
              </div>
          @endif
          @if (auth()->user()->role !== 'Admin')
              @livewire('backend.notifications.notify')
          @endif
          <!-- User name -->
          <span @click="show = !show" class="text-gray-600 cursor-pointer">{{ auth()->user()->username }}</span>

          <!-- Profile picture that toggles the dropdown -->
          @if (!empty(auth()->user()->image))
              <img @click="show = !show" src="{{ asset('storage/images/' . auth()->user()->image) }}"
                  alt="Profile Picture" class="rounded-full h-8 w-8 cursor-pointer">
          @else
              <img @click="show = !show" src="{{ asset('images/avatar.jpg') }}"
                  class="rounded-full h-10 w-10 cursor-pointer">
          @endif
          <!-- Dropdown menu -->
          <div x-show="show" @click.outside="show = false" x-transition style="display: none"
              class="absolute top-12 right-5 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-md">
              <ul class="text-sm">
                  <a wire:navigate href="{{ route('profile.update', auth()->id()) }}">
                      <li class="px-4 py-2 text-gray-700 hover:bg-gray-100 cursor-pointer">Profile</li>
                  </a>
                  <a wire:navigate href="{{ route('profile.password.update', auth()->id()) }}">
                      <li class="px-4 py-2 text-gray-700 hover:bg-gray-100 cursor-pointer">Settings</li>
                  </a>
                  <li class="w-full cursor-pointer">
                      <livewire:auth.logout />
                  </li>
              </ul>
          </div>
      </div>

  </header>
