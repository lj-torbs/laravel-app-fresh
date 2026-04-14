<x-layout title="View Book">
    <div class="w-full max-w-4xl">
        <div class="bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-3xl shadow-2xl text-white">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="w-full md:w-1/3">
                    @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="w-full rounded-2xl shadow-lg border border-white/10">
                    @else
                        <div class="w-full aspect-[3/4] bg-white/10 rounded-2xl flex items-center justify-center text-blue-200 border border-dashed border-white/20">
                            No Cover
                        </div>
                    @endif
                </div>

                <div class="flex-grow">
                    <h2 class="text-4xl font-extrabold mb-1">{{ $book->title }}</h2>
                    <p class="text-xl text-blue-300 mb-6 italic">by {{ $book->author }}</p>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-white/5 p-4 rounded-2xl border border-white/5">
                            <span class="text-blue-400 text-xs font-bold uppercase tracking-widest block">Genre</span>
                            <span class="text-lg">{{ $book->genre }}</span>
                        </div>
                        <div class="bg-white/5 p-4 rounded-2xl border border-white/5">
                            <span class="text-blue-400 text-xs font-bold uppercase tracking-widest block">Price</span>
                            <span class="text-lg font-mono">₱{{ number_format($book->price, 2) }}</span>
                        </div>
                    </div>

                    <p class="text-blue-100 leading-relaxed mb-8 text-lg">{{ $book->description }}</p>

                    <div class="flex gap-4">
                        <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-xl transition shadow-lg">Edit Book</a>
                        <a href="{{ route('books.index') }}" class="bg-white/10 hover:bg-white/20 text-white py-3 px-6 rounded-xl border border-white/10 transition">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>