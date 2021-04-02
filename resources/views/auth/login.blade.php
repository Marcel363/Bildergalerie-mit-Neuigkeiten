@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                {{session('status')}}
                </div>
            @endif
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Name</label>
                    <input type ="text" name="email" id="email" placeholder="Email-Adresse"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')border-red-500"@enderror" value="{{old('email')}}">
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{'E-Mail / Benutzername / Passwort stimmen nicht überein'}}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Name</label>
                    <input type ="password" name="password" id="password" placeholder="Passwort"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')border-red-500"@enderror" value="">
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{'Passwort wird benötigt!'}}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2" >
                        <label for="remember">Benutzer merken</label>
                    </div>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
                                                font-medium w-full">Einloggen</button>
                </div>
            </form>
        </div>
    </div>
@endsection
