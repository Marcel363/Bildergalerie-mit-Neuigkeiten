@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="card-header w-full bg-blue-50 p-6 rounded-lg font-bold" style="font-size: 30px; font-family: 'Nunito',
             sans-serif">Bilder hochladen</div>
            <br>
            <form action="/image" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <input type="file" name="image[]" class="form-control-image" multiple accept="image/*">
                </div>
                <br>
                <input type="submit" value="Upload" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            </form>
        </div>
    </div>
@endsection
