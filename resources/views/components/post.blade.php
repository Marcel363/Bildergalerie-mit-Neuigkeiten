@props(['post'=>$post])

<div class="mb-4">
    <a href="{{route('users.posts', $post->user)}}" class="font-bold">{{$post->user->name}}</a> <span
        class="text-gray-600 text-sm">{{$post->created_at->diffforHumans()  }}</span>
    <?php // diffforHumans für soviele Stunden/Minuten seit dem Post, toTimeString für die übliche Zeitangabe php?>

    <p class="mb-2 bg-gray-200 lg:w-max rounded p-5">{{$post->body}}</p>

    @can('delete', $post)
        <form action="{{route('posts.destroy', $post )}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan


    <div class="flex items-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{route('posts.likes', $post->id)}}" method="post" class="mr-1">
                    @csrf
                    <button type="sumit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{route('posts.likes', $post)}}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <?php // Da man kein delete in html nutzen kann, muss man method spoofing betreiben?>
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
        @endauth
        <span class="bg-blue-300 rounded p-1.5">{{$post->likes->count()}} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>

<?php //php artisan make:component Post um duplikation von Code zu vermeiden
