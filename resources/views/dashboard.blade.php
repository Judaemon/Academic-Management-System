<x-app-layout>
    @if (empty(Auth::user()->password_changed_at == route('change-password')))
    @else route('/dashboard')
    @endif

    <div class="mb-4 p-4 flex justify-between">
        <h1 class="text-2xl font-semibold text-gray-700">Dashboard</h1>

        <div class="flex justify-end gap-x-2">
            {{-- action btns --}}
        </div>
    </div>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <h2>You are logged in!</h2>
    </div>
</x-app-layout>
