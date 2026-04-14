<x-layout title="Book List">
    <div class="w-full">
        
        @if(session('success'))
            <div class="bg-green-500/90 backdrop-blur-sm text-white p-4 rounded-xl mb-6 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-4xl font-extrabold tracking-tight">Book Management</h2>
                <p class="text-blue-200 mt-1">Search and filter your local library collection</p>
            </div>
            <a href="{{ route('books.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-xl transition-all shadow-lg">
                + Add Book
            </a>
        </div>

        <div class="flex flex-col md:flex-row gap-4 mb-8">
            <div class="relative flex-grow flex shadow-lg rounded-2xl overflow-hidden border border-white/10 group focus-within:border-blue-500/50 transition-all bg-white/10">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-blue-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                
                <input type="text" id="search_input" 
                    class="w-full bg-transparent pl-12 pr-4 py-4 text-white placeholder-blue-200/50 outline-none transition-all" 
                    placeholder="Search by title or author...">
                
                <button type="button" onclick="fetchBooks()" class="bg-blue-600 hover:bg-blue-500 text-white px-8 font-bold transition-colors border-l border-white/10">
                    Search
                </button>
            </div>
            
            <div class="relative min-w-[200px]">
                <select id="genre_filter" 
                    class="w-full appearance-none bg-white/10 border border-white/10 p-4 pr-10 rounded-2xl text-white outline-none cursor-pointer focus:border-blue-500/50 shadow-lg">
                    <option value="" class="text-black">All Genres</option>
                    <option value="Fiction" class="text-black">Fiction</option>
                    <option value="Non-Fiction" class="text-black">Non-Fiction</option>
                    <option value="Sci-Fi" class="text-black">Sci-Fi</option>
                    <option value="Fantasy" class="text-black">Fantasy</option>
                    <option value="Mystery" class="text-black">Mystery</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-blue-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/5 shadow-2xl">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-white/10 text-blue-100 uppercase text-xs font-bold tracking-widest">
                        <th class="p-5">Cover</th>
                        <th class="p-5">Title</th>
                        <th class="p-5">Author</th>
                        <th class="p-5">Genre</th>
                        <th class="p-5 text-right">Price</th>
                        <th class="p-5 text-center">Status</th>
                    </tr>
                </thead>
                <tbody id="book-table-body" class="divide-y divide-white/5 transition-opacity duration-200">
                    @include('books.partials.book_list')
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let searchTimer;

            // Define the fetch function globally so the button can use it
            window.fetchBooks = function() {
                let search = $('#search_input').val();
                let genre = $('#genre_filter').val();

                // Subtle visual feedback that data is loading
                $('#book-table-body').addClass('opacity-50');

                $.ajax({
                    url: "{{ route('books.index') }}",
                    method: 'GET',
                    data: { search: search, genre: genre },
                    success: function(data) {
                        $('#book-table-body').html(data).removeClass('opacity-50');
                    },
                    error: function() {
                        $('#book-table-body').removeClass('opacity-50');
                    }
                });
            }

            // Live Search Logic: wait 300ms after the user stops typing
            $('#search_input').on('keyup', function() {
                clearTimeout(searchTimer);
                searchTimer = setTimeout(fetchBooks, 300); 
            });

            // Instant search when the genre changes
            $('#genre_filter').on('change', fetchBooks);
        });
    </script>
</x-layout>