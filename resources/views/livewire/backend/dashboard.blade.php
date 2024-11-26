<div>
    @if (auth()->user()->role === 'Patient')
        {{-- Patient Dashboard  --}}
        @include('includes.patient-dashboard')
    @elseif (auth()->user()->role === 'Doctor')
        {{-- Doctor Dashboard  --}}
        @include('includes.doct-dashboard')
    @elseif (auth()->user()->role === 'Admin')
        {{-- Admin Dashboard  --}}
        @include('includes.admin-dashboard')
    @endif
</div>
