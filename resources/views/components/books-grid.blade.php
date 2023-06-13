@props(['books'])

@if ($books->count() > 0)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($books as $book)
            <x-book-card :book="$book" class="{{ 'col-span-2' }}" />
        @endforeach
    </div>
@endif
