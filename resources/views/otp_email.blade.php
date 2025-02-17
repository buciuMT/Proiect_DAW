<x-app-layout>
    <h1>Enter your Email</h1>
    <form action="{{ route('passwordForm') }}" method="POST">
        @csrf
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Next</button>
    </form>
</x-app-layout>
