@component('mail::message')
# Introduction

{{$liker->name}} hat deinen Post geliked.

@component('mail::button', ['url' => route('posts.show', $post)])
    Post ansehen.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
