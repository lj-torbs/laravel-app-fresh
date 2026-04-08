<x-layout>
    <div class="max-w-6xl mx-auto p-4 md:p-8 space-y-12">
        <!-- FORM SECTION -->
        <div
            class="max-w-2xl mx-auto p-8 bg-black border-4 border-black shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] rounded-xl my-10">
            <h1 class="text-6xl font-black text-white-900 mb-8 tracking-tighter uppercase italic">ZZZZZZZZ</h1>

            <form action="/user-registration" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">First Name</label>
                    <input type="text" name="first-name"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        placeholder="John" required>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Last Name</label>
                    <input type="text" name="last-name"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        placeholder="Doe" required>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Middle Name</label>
                    <input type="text" name="middle-name"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        required>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Nickname</label>
                    <input type="text" name="nickname"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        required>
                </div>

                <div class="space-y-1 md:col-span-2">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Email
                        Address</label>
                    <input type="email" name="email"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        placeholder="you@example.com" required>
                    @error('email')
                        <p class="text-red-600 font-bold text-sm mt-1">⚠ {{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Age</label>
                    <input type="number" name="age"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        required>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Contact
                        Number</label>
                    <input type="text" name="contact-number"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        required>
                </div>

                <div class="space-y-1 md:col-span-2">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Address</label>
                    <input type="text" name="address"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        required>
                </div>

                <div class="md:col-span-2 pt-4">
                    <button type="submit"
                        class="w-full bg-black text-white font-black py-4 rounded-lg hover:bg-yellow-400 hover:text-black border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:shadow-none active:translate-x-[2px] active:translate-y-[2px] transition-all uppercase tracking-widest">
                        Submit Registration
                    </button>
                </div>
            </form>
        </div>
        <div class="bg-white border-4 border-black rounded-xl overflow-hidden shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
            <div class="p-6 border-b-4 border-black bg-yellow-400">
                <h2 class="text-2xl font-black uppercase tracking-tight">Registered Legends</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-black text-white border-b-2 border-black">
                            <th class="p-4 font-black uppercase text-sm">#</th>
                            <th class="p-4 font-black uppercase text-sm">Full Name</th>
                            <th class="p-4 font-black uppercase text-sm">Nickname</th>
                            <th class="p-4 font-black uppercase text-sm">Email</th>
                            <th class="p-4 font-black uppercase text-sm">Age</th>
                            <th class="p-4 font-black uppercase text-sm">Contact</th>
                            <th class="p-4 font-black uppercase text-sm">Address</th>
                            <th class="p-4 font-black uppercase text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-2 divide-gray-100">
                        @forelse ($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4 font-bold text-gray-400">#{{ $user->id }}</td>
                                <td class="p-4">
                                    <div class="font-black text-gray-900">{{ $user['first-name'] }}
                                        {{ $user['last-name'] }}</div>
                                    <div class="text-xs text-gray-500 uppercase">{{ $user['middle-name'] ?? '' }}</div>
                                </td>
                                <td class="p-4 font-medium text-blue-600">{{ $user['nickname'] ?? '—' }}</td>
                                <td class="p-4 text-gray-600 italic">{{ $user->email }}</td>
                                <td class="p-4">
                                    <span
                                        class="bg-black text-white px-2 py-1 rounded text-xs font-bold">{{ $user->age }}</span>
                                </td>
                                <td class="p-4 text-sm text-black font-mono">{{ $user['contact-number'] }}</td>
                                <td class="p-4 text-sm text-gray-600 max-w-xs truncate">{{ $user->address }}</td>
                                <td class="p-4">
                                    <div class="flex items-center gap-2">

                                        <a href="/user-registration/{{ $user->id }}/edit"
                                            class="bg-blue-500 text-white p-2 rounded border-2 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:bg-blue-400 active:shadow-none active:translate-x-[1px] active:translate-y-[1px] transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>

                                        <form action="/user-registration/{{ $user->id }}" method="POST"
                                            onsubmit="return confirm('Delete this legend?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white p-2 rounded border-2 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:bg-red-400 active:shadow-none active:translate-x-[1px] active:translate-y-[1px] transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="3"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="p-12 text-center">
                                    <div class="text-gray-400 font-black uppercase tracking-widest">No users found in
                                        the void.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>