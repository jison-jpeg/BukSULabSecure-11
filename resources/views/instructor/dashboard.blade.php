<x-app-layout>
    <h1>You are logged in as Instructor</h1>

    {{-- Add logout --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</x-app-layout>
