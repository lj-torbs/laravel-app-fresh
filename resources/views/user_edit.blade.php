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
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>

    <div class="min-h-screen animate-mesh py-12 px-4 flex items-center justify-center">
        <div class="max-w-2xl w-full">
            
            <div class="text-center mb-8">
                <h1 class="text-3xl font-black text-white tracking-tighter">Edit User Profile</h1>
                <p class="text-indigo-300 uppercase tracking-widest text-[10px] font-bold opacity-70">Update Account Details</p>
            </div>

            <div class="glass-card rounded-[2.5rem] p-8 md:p-12 shadow-2xl">
                <form action="/users/{{ $user->id }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-black text-indigo-300 uppercase tracking-widest mb-2">First Name</label>
                            <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" 
                                   class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                            @error('first_name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-indigo-300 uppercase tracking-widest mb-2">Last Name</label>
                            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" 
                                   class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                            @error('last_name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
    <label class="block text-[10px] font-black text-indigo-300 uppercase tracking-widest mb-2">Nickname</label>
    <input type="text" name="nickname" value="{{ old('nickname', $user->nickname) }}" 
           class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
    @error('nickname') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
</div>
                    <div>
                        <label class="block text-[10px] font-black text-indigo-300 uppercase tracking-widest mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                               class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                        @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-black text-indigo-300 uppercase tracking-widest mb-2">Age</label>
                            <input type="number" name="age" value="{{ old('age', $user->age) }}" 
                                   class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-indigo-300 uppercase tracking-widest mb-2">Contact Number</label>
                            <input type="text" name="contact_number" value="{{ old('contact_number', $user->contact_number) }}" 
                                   class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 pt-4">
                        <a href="/users" class="flex-1 text-center py-4 rounded-2xl text-slate-400 text-sm font-bold hover:bg-white/5 transition-all">Cancel</a>
                        <button type="submit" class="flex-[2] bg-indigo-600 hover:bg-indigo-500 py-4 rounded-2xl text-sm font-bold text-white shadow-xl shadow-indigo-500/20 transition-all active:scale-95">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout> 