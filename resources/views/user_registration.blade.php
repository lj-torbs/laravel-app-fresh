<x-layout>
    <div class="flex items-center justify-center min-h-screen py-10">
        <div style="background: #1a2a40; padding: 40px; border-radius: 12px; width: 100%; max-width: 800px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); color: white;">
            
            <h2 style="text-align: center; margin-bottom: 30px; font-size: 24px; font-weight: bold;">Register New User</h2>

            @if (session('status'))
                <div style="background: #10b981; color: white; padding: 12px; margin-bottom: 20px; border-radius: 6px; text-align: center;">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                    
                    <div>
                        <label style="display:block; margin-bottom: 5px;">First Name:</label>
                        <input type="text" name="first_name" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #334155; background: #0f172a; color: white;" required>
                    </div>

                    <div>
                        <label style="display:block; margin-bottom: 5px;">Last Name:</label>
                        <input type="text" name="last_name" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #334155; background: #0f172a; color: white;" required>
                    </div>

                    <div>
                        <label style="display:block; margin-bottom: 5px;">Middle Name:</label>
                        <input type="text" name="middle_name" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #334155; background: #0f172a; color: white;">
                    </div>

                    <div>
                        <label style="display:block; margin-bottom: 5px;">Nickname:</label>
                        <input type="text" name="nickname" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #334155; background: #0f172a; color: white;">
                    </div>

                    <div>
                        <label style="display:block; margin-bottom: 5px;">Email:</label>
                        <input type="email" name="email" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #334155; background: #0f172a; color: white;" required>
                    </div>

                    <div>
                        <label style="display:block; margin-bottom: 5px;">Age:</label>
                        <input type="number" name="age" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #334155; background: #0f172a; color: white;" required>
                    </div>

                    <div>
                        <label style="display:block; margin-bottom: 5px;">Contact Number:</label>
                        <input type="text" name="contact_number" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #334155; background: #0f172a; color: white;" required>
                    </div>

                    <div>
                        <label style="display:block; margin-bottom: 5px;">Password:</label>
                        <input type="password" name="password" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #334155; background: #0f172a; color: white;" required>
                    </div>

                    <div class="md:col-span-2">
                        <label style="display:block; margin-bottom: 5px;">Address:</label>
                        <textarea name="address" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #334155; background: #0f172a; color: white; height: 80px;" required></textarea>
                    </div>
                </div>

                <div style="margin-top: 30px;">
                    <button type="submit" style="width: 100%; padding: 14px; border: none; border-radius: 6px; background: white; color: #1a2a40; font-weight: bold; cursor: pointer;">
                        Save User
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-layout>