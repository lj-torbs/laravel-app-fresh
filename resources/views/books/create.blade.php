<x-layout title="Add New Book">
    <div class="w-full max-w-4xl">
        <div class="mb-8">
            <h2 class="text-4xl font-extrabold tracking-tight text-white">Add New Book</h2>
            <p class="text-blue-200 mt-2 text-lg">Enter the details below to expand your library collection.</p>
        </div>

        <div class="bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-3xl shadow-2xl">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col">
                        <label class="text-blue-100 font-semibold mb-2 ml-1">Title</label>
                        <input type="text" name="title" 
                            class="bg-white/10 border border-white/20 p-3 rounded-xl text-white placeholder-blue-300 focus:bg-white/20 outline-none transition-all shadow-inner" 
                            placeholder= >
                    </div>

                    <div class="flex flex-col">
                        <label class="text-blue-100 font-semibold mb-2 ml-1">Author</label>
                        <input type="text" name="author" 
                            class="bg-white/10 border border-white/20 p-3 rounded-xl text-white placeholder-blue-300 focus:bg-white/20 outline-none transition-all shadow-inner" 
                            placeholder=>
                    </div>

                    <div class="flex flex-col md:col-span-2">
                        <label class="text-blue-100 font-semibold mb-2 ml-1">Description</label>
                        <textarea name="description" rows="3"
                            class="bg-white/10 border border-white/20 p-3 rounded-xl text-white placeholder-blue-300 focus:bg-white/20 outline-none transition-all shadow-inner" 
                            placeholder=></textarea>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-blue-100 font-semibold mb-2 ml-1">Genre</label>
                        <select name="genre" 
                            class="bg-white/10 border border-white/20 p-3 rounded-xl text-white focus:bg-white/20 outline-none transition-all cursor-pointer shadow-inner">
                            <option value="" class="text-black">Select Genre</option>
                            <option value="Fiction" class="text-black">Fiction</option>
                            <option value="Non-Fiction" class="text-black">Non-Fiction</option>
                            <option value="Sci-Fi" class="text-black">Sci-Fi</option>
                            <option value="Fantasy" class="text-black">Fantasy</option>
                            <option value="Mystery" class="text-black">Mystery</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-blue-100 font-semibold mb-2 ml-1">Published Year</label>
                        <input type="number" name="published_year" 
                            class="bg-white/10 border border-white/20 p-3 rounded-xl text-white focus:bg-white/20 outline-none transition-all shadow-inner" required>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-blue-100 font-semibold mb-2 ml-1">ISBN</label>
                        <input type="text" name="isbn" 
                            class="bg-white/10 border border-white/20 p-3 rounded-xl text-white focus:bg-white/20 outline-none transition-all shadow-inner" required>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-blue-100 font-semibold mb-2 ml-1">Pages</label>
                        <input type="number" name="pages" 
                            class="bg-white/10 border border-white/20 p-3 rounded-xl text-white focus:bg-white/20 outline-none transition-all shadow-inner" required>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-blue-100 font-semibold mb-2 ml-1">Publisher</label>
                        <input type="text" name="publisher" 
                            class="bg-white/10 border border-white/20 p-3 rounded-xl text-white focus:bg-white/20 outline-none transition-all shadow-inner" required>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-blue-100 font-semibold mb-2 ml-1">Price (₱)</label>
                        <input type="number" step="0.01" name="price" 
                            class="bg-white/10 border border-white/20 p-3 rounded-xl text-white focus:bg-white/20 outline-none transition-all shadow-inner" required>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-blue-100 font-semibold mb-2 ml-1">Language</label>
                        <input type="text" name="language" 
                            class="bg-white/10 border border-white/20 p-3 rounded-xl text-white focus:bg-white/20 outline-none transition-all shadow-inner" required>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-blue-100 font-semibold mb-2 ml-1">Cover Image</label>
                        <input type="file" name="cover_image" 
                            class="text-sm text-blue-200 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition-all">
                    </div>

                    <div class="flex items-center space-x-3 mt-4 md:col-span-2">
                        <input type="checkbox" name="is_available" id="available" checked
                            class="w-5 h-5 rounded border-white/20 bg-white/10 text-blue-600 focus:ring-blue-500 transition-all">
                        <label for="available" class="text-blue-100 font-medium cursor-pointer">This book is currently available for borrowing</label>
                    </div>
                </div>

                <div class="mt-10 flex gap-4">
                    <button type="submit" 
                        class="flex-grow bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-2xl transition-all shadow-lg active:scale-95">
                        Save Book to Library
                    </button>
                    <a href="{{ route('books.index') }}" 
                        class="bg-white/10 hover:bg-white/20 text-white font-semibold py-4 px-8 rounded-2xl transition-all border border-white/10 text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>