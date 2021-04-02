@extends('layouts.app')

@section('content')


<div class ="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="container">
            <a href="/BilderUpload" class="bg-yellow-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload</a>
            <a class="mt-5 flex justify-center bg-blue-500 text-white font-bold py-2 px-10 rounded">Bildergalerie</a>
        </div>

            <div class="rounded overflow-hidden shadow-lg">
                <div class="grid grid-cols-4">
        @forelse($images as $image)
                                    <img class="py-3 pl-3 pr-1 rounded" height="1000" width="1000" src="{{asset($image->image)}}" alt="" >
                    @auth
                    @if($image->user_id == Auth::user()->id)
                        <form action="/image/{{$image->id}}" method="post">
                            @method('DELETE')
                            @csrf
                                <input type="submit" value="Löschen" class=" mt-20 bg-red-700 hover:bg-blue-700 text-white font-bold py-4 px-5 rounded">
                                </br><a class="font-bold">erstellt von dir</a>
                        </form>
                            @else
                                <a class="font-bold mr-1 mt-20">erstellt von {{$image -> user-> username}}</a>
                            @endif
                        @endauth
                    @guest
                        <a class="font-bold mr-1 mt-20">erstellt von {{$image -> user-> username}}</a>
                        @endguest
        @empty
        <h1 class="text-danger">Es gibt noch keine Bilder</h1>
        @endforelse
                </div>
                <div class="row justify-content-center">
                    {{$images->links()}}
                </div>
        </div>
    </div>
</div>
@endsection
