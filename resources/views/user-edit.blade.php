<x-layout>
    <div class="max-w-6xl mx-auto p-4 md:p-8 space-y-12">

        <div
            class="max-w-2xl mx-auto p-8 bg-white border-4 border-black shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] rounded-xl my-10">
            <h1 class="text-6xl font-black text-gray-900 mb-8 tracking-tighter uppercase italic">WHATTTTT</h1>

            <form action="/user-registration/{{ $user -> id }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                @method("PATCH")
                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">First Name</label>
                    <input type="text" name="first-name"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        placeholder="John" value="{{$user['first-name']}}" required>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Last Name</label>
                    <input type="text" name="last-name"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        placeholder="Doe" value="{{$user['last-name'] }}" required>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Middle Name</label>
                    <input type="text" name="middle-name"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        value="{{ $user['middle-name'] }}" required>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Nickname</label>
                    <input type="text" name="nickname"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        value="{{ $user -> nickname }}" required>
                </div>

                <div class="space-y-1 md:col-span-2">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Email
                        Address</label>
                    <input type="email" name="email"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        placeholder="you@example.com" value="{{ $user -> email }}" required>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Age</label>
                    <input type="number" name="age"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        value="{{ $user -> age }}" required>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Contact
                        Number</label>
                    <input type="text" name="contact-number"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        value="{{ $user['contact-number'] }}" required>
                </div>

                <div class="space-y-1 md:col-span-2">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest">Address</label>
                    <input type="text" name="address"
                        class="w-full bg-gray-50 border-2 border-black rounded-lg p-3 text-gray-900 focus:bg-yellow-50 transition-colors outline-none font-bold"
                        value="{{ $user -> address }}" required>
                </div>

                <div class="md:col-span-2 pt-4">
                    <button type="submit"
                        class="w-full bg-black text-white font-black py-4 rounded-lg hover:bg-yellow-400 hover:text-black border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:shadow-none active:translate-x-[2px] active:translate-y-[2px] transition-all uppercase tracking-widest">
                        Submit Update
                    </button>
                </div>
            </form>
        </div>
        
</x-layout>