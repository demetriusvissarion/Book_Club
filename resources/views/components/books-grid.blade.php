@props(['posts'])

<x-post-featured-card :post="$posts[0]" />

@if ($posts->count() > 1) {{-- prevent rendering of empty grid --}}
<div class="lg:grid lg:grid-cols-6">
    @foreach ($posts->skip(1) as $post)
        {{-- Set diplay to 2 cols for first 2 posts and to 3 cols for all posts after: --}}
        <x-post-card
            :post="$post"
            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
    @endforeach
</div>
@endif
