<x-layout content="Hello there">
    <h1>Мои тупые истории про рыбок</h1>
    @foreach ($posts as $post)
        <article class="{{ $loop->even ? 'mb-6' : '' }}">
            <h2><a href="/posts/{{ $post->getSlug(); }}">{{ $post->getTitle(); }} <a></h2>
            <div>
                {{  $post->getExcerpt(); }}
            </div>
        </article>
    @endforeach
</x-layout>
