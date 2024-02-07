<x-layout content="Hello there">
    <h1>Tested place for Eloquent</h1>
    @foreach ($posts as $post)
        <article class="{{ $loop->even ? 'mb-6' : '' }}">
            <h2><a href="/posts/{{ $post->slug; }}">{{ $post->title; }} <a></h2>
            <p>
                <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }}</a>

            </p>
            <div>
                {{  $post->excerpt; }}
            </div>
        </article>
    @endforeach
</x-layout>
