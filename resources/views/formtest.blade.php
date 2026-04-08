<x-layout>
    <style>
        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animate-mesh {
            background: linear-gradient(-45deg, #741a1a, #1e1b4b, #ac3636, #020617);
            background-size: 400% 400%;
            animation: gradientFlow 10s ease infinite;
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>

    <div class="min-h-screen animate-mesh py-12 px-4 sm:px-6 lg:px-8 font-sans antialiased flex items-center">
        <div class="max-w-xl mx-auto w-full">
            
            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">
                
                <div class="px-8 pt-8 pb-6 bg-gradient-to-b from-white/5 to-transparent">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-indigo-500/20 rounded-2xl ring-1 ring-indigo-400/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white tracking-tight">Text Manager</h1>
                            <p class="text-xs text-indigo-300 uppercase tracking-widest font-bold opacity-70">Demonstration purposes</p>
                        </div>
                    </div>
                </div>

                <div class="px-8 pb-8">
                    <form method="POST" action="/formtest">
                        @csrf
                        <div class="relative group">
                            <label for="description" class="block text-xs font-semibold text-slate-400 mb-2 ml-1 uppercase tracking-wider">
                                Post
                            </label>
                            <input 
                                id="description"
                                type="text"
                                name="description"
                                required
                                placeholder="Enter your post here..."
                                class="w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-3.5 text-sm transition-all
                                       placeholder:text-slate-600
                                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none"
                            />
                        </div>

                        <div class="mt-4 flex justify-end">
                            <button 
                                type="submit"
                                class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-500 active:scale-95 transition-all px-8 py-3 rounded-xl text-sm font-bold text-white shadow-lg shadow-indigo-500/20"
                            >
                                Save Post
                            </button>
                        </div>
                    </form>
                </div>

                <div class="px-8">
                    <div class="w-full border-t border-white/5"></div>
                </div>

                <div class="px-8 py-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-sm font-bold text-slate-300 flex items-center">
                            <span>Saved Emails</span>
                        </h2>
                        <span class="px-2.5 py-1 text-[10px] font-black bg-indigo-500/20 text-indigo-300 rounded-lg border border-indigo-500/30 uppercase">
                            {{ count($posts) }} Total
                        </span>
                    </div>

                    <ul class="space-y-3">
                        @forelse ($posts as $post)
                            <li class="group flex items-center justify-between bg-white/5 hover:bg-white/10 px-4 py-4 rounded-2xl border border-white/5 transition-all duration-300">
                                
                                <div class="flex items-center space-x-3">
                                    <div class="h-2 w-2 rounded-full bg-indigo-400 shadow-[0_0_10px_rgba(129,140,248,0.5)]"></div>
                                    <span class="text-sm font-medium text-slate-200">
                                        {{ $post->description }}
                                    </span>
                                </div>

                                <form method="POST" action="/formtest/{{ $post->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit"
                                        class="opacity-0 group-hover:opacity-100 transition-all text-slate-400 hover:text-red-400 p-1 transform hover:scale-110"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </li>
                        @empty
                            <div class="text-center py-12 rounded-2xl bg-white/5 border border-dashed border-white/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-slate-600 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <p class="text-slate-500 text-sm font-medium">No records found.</p>
                            </div>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="text-center mt-8">
                <p class="text-slate-500 text-[10px] uppercase tracking-[0.3em] font-bold">
                    University of Mindanao • Data Systems
                </p>
            </div>
        </div>
    </div>
</x-layout>