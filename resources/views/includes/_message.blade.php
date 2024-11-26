{{-- <div x-data="{ message: true }" x-show="message" x-transition.duration.500ms
    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded relative" role="alert">
    <strong class="font-bold">Success!</strong> <span>{{ session('success') }}</span>
    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close" @click="message = false">
        <span class="text-green-700" aria-hidden="true">×</span>
    </button>
</div> --}}
<p id="toastr" data-message="{{ session('success') }}"></p>

{{-- @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if (session('info'))
        toastr.info("{{ session('info') }}");
    @endif

    @if (session('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif --}}
