@props(['books'])

<x-book-featured-card :book="$books[0]" />

@if ($books->count() > 1) {{-- prevent rendering of empty grid --}}
<div class="lg:grid lg:grid-cols-6">
    @foreach ($books->skip(1) as $book)
{{--    @foreach ($books as $book)--}}
        {{-- Set diplay to 2 cols for first 2 books and to 3 cols for all books after: --}}
        <x-book-card
            :book="$book"
{{--            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>--}}
            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-3' }}"/>
{{--            class="{{  'col-span-2' }}"/>--}}
    @endforeach
</div>
@endif
