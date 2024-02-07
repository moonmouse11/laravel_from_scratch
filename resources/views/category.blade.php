<x-layout>
    @foreach ($posts as $post)
    <h1><a href="/posts/{{ $post->slug }}">{{$post->title }}</a></h1>
    <p>{!! $post->excerpt !!}</p>
    <article>
        <div>
        </div>
    </article>
    @endforeach
    <a href="/">Go Back</a>
</x-layout>
