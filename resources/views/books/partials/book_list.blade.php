@forelse($books as $book)
<tr class="hover:bg-white/5 transition-colors">
    <td class="p-4">
        @if($book->cover_image)
            <img src="{{ asset('storage/' . $book->cover_image) }}" class="w-12 h-16 object-cover rounded shadow-sm">
        @else
            <div class="text-xs text-gray-400">No Image</div>
        @endif
    </td>
    <td class="p-4 font-medium text-white">{{ $book->title }}</td>
    <td class="p-4 text-blue-100">{{ $book->author }}</td>
    <td class="p-4 text-blue-100">{{ $book->genre }}</td>
    <td class="p-4 text-right font-mono text-blue-300">₱{{ number_format($book->price, 2) }}</td>
    <td class="p-4 text-center">
        <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase {{ $book->is_available ? 'bg-green-500/20 text-green-400 border border-green-500/50' : 'bg-red-500/20 text-red-400 border border-red-500/50' }}">
            {{ $book->is_available ? 'Available' : 'Out of Stock' }}
        </span>
    </td>
    <td class="p-4">
        <div class="flex gap-2 justify-center">
            <a href="{{ route('books.show', $book->id) }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded transition">
               View
            </a>

            <a href="{{ route('books.edit', $book->id) }}" 
               class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-3 py-1 rounded transition">
               Edit
            </a>

            <form action="{{ route('books.destroy', $book->id) }}" method="POST" 
                  onsubmit="return confirm('Delete this book permanently?')">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded transition">
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="7" class="p-10 text-center text-blue-200 italic">No books found matching your criteria.</td>
</tr>
@endforelse