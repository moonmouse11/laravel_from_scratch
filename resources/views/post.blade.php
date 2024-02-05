<x-layout>
    <h1>{{ $post->getTitle(); }}</h1>
    <article>
        <div>
            {!! $post->getBody() !!}
        </div>
    </article>
    <a href="/">Go Back</a>
</x-layout>
