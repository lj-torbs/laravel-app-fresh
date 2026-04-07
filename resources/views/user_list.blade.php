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
            animation: gradientFlow 15s ease infinite;
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .table-row-hover:hover {
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }
    </style>

    <div class="min-h-screen animate-mesh py-12 px-4 sm:px-6 lg:px-8 font-sans antialiased">
        <div class="max-w-6xl mx-auto w-full">
            
            @if (session('status'))
                <div class="mb-6 glass-card border-emerald-500/30 bg-emerald-500/10 px-6 py-4 rounded-2xl flex items-center space-x-3 animate-pulse">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-emerald-200 text-sm font-medium">{{ session('status') }}</span>
                </div>
            @endif

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 space-y-4 md:space-y-0">
                <div>
                    <h1 class="text-3xl font-bold text-white tracking-tight">Database Records</h1>
                    <p class="text-indigo-300 uppercase tracking-widest font-bold text-[10px] opacity-70">User Management System</p>
                </div>
                
                <div class="flex flex-col sm:flex-row items-center space-x-0 sm:space-x-4 space-y-4 sm:space-y-0">
                    <form action="/users" method="GET" class="relative group w-full sm:w-64">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Search records..." 
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-sm text-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all placeholder:text-slate-500"
                        >
                        <button type="submit" class="absolute right-3 top-2 text-slate-500 hover:text-indigo-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>

                    <div class="glass-card px-4 py-2 rounded-2xl border border-white/10 hidden sm:block">
                        <span class="text-xs text-slate-400 block uppercase font-black text-[9px]">Total Members</span>
                        <span class="text-xl font-bold text-indigo-400">{{ count($users) }}</span>
                    </div>
                    <a href="/register" class="bg-indigo-600 hover:bg-indigo-500 transition-all px-6 py-3 rounded-xl text-sm font-bold text-white shadow-lg shadow-indigo-500/20 w-full sm:w-auto text-center">
                        + Add New
                    </a>
                </div>
            </div>

            <div class="glass-card rounded-[2rem] overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white/5 border-b border-white/10">
                                <th class="px-6 py-5 text-[11px] font-black text-indigo-300 uppercase tracking-widest">Full Name</th>
                                <th class="px-6 py-5 text-[11px] font-black text-indigo-300 uppercase tracking-widest">Nickname</th>
                                <th class="px-6 py-5 text-[11px] font-black text-indigo-300 uppercase tracking-widest">Email Address</th>
                                <th class="px-6 py-5 text-[11px] font-black text-indigo-300 uppercase tracking-widest">Age</th>
                                <th class="px-6 py-5 text-[11px] font-black text-indigo-300 uppercase tracking-widest">Contact</th>
                                <th class="px-6 py-5 text-[11px] font-black text-indigo-300 uppercase tracking-widest text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @forelse ($users as $user)
                                <tr class="table-row-hover">
                                    <td class="px-6 py-5">
                                        <div class="flex items-center space-x-3">
                                            <div class="h-8 w-8 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-[10px] font-bold text-white">
                                                {{ strtoupper(substr($user->first_name, 0, 1)) }}
                                            </div>
                                            <span class="text-sm font-semibold text-slate-200">{{ $user->first_name }} {{ $user->last_name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-sm text-slate-400 font-medium">
                                        {{ $user->nickname ?? '—' }}
                                    </td>
                                    <td class="px-6 py-5 text-sm text-indigo-300/80 italic">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-5 text-sm text-slate-300">
                                        <span class="px-2 py-1 rounded-md bg-white/5 border border-white/10">{{ $user->age }}</span>
                                    </td>
                                    <td class="px-6 py-5 text-sm text-slate-300">
                                        {{ $user->contact_number }}
                                    </td>
                                    <td class="px-6 py-5 text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="/users/{{ $user->id }}/edit" class="p-2 text-slate-500 hover:text-indigo-400 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>

                                            <form action="/users/{{ $user->id }}" method="POST" onsubmit="return confirm('Remove this user from database?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-slate-500 hover:text-red-400 transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-20 text-center">
                                        <p class="text-slate-500 font-medium">No records found.</p>
                                        @if(request('search'))
                                            <a href="/users" class="text-indigo-400 text-xs uppercase font-bold mt-2 inline-block">Clear Search</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-8 text-center">
                 <p class="text-slate-500 text-[9px] uppercase tracking-[0.4em] font-black">Secure Data Layer • University of Mindanao</p>
            </div>
        </div>
    </div>
</x-layout>