<x-app-layout>
<body>
    <h1>Enter your Password</h1>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value={{$email}} required autofocus autocomplete="username" />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Submit</button>
    </form>
</body>
</x-app-layout>
