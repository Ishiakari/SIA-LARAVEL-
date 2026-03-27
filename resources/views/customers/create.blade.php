<x-app-layout>
    <div class="py-12">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow-lg border">
            <h2 class="text-2xl font-bold mb-6 text-indigo-700">Add New Customer</h2>
            
            <form action="{{ route('customers.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block font-bold text-gray-700">Full Name</label>
                    <input type="text" name="name" style="border: 1px solid #ccc !important;" class="w-full p-2 rounded mt-1 text-gray-900" required>
                </div>

                <div>
                    <label class="block font-bold text-gray-700">Address</label>
                    <textarea name="address" style="border: 1px solid #ccc !important;" class="w-full p-2 rounded mt-1 text-gray-900" required></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold text-gray-700">Gender</label>
                        <select name="gender" style="border: 1px solid #ccc !important;" class="w-full p-2 rounded mt-1 text-gray-900">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700">Birthday</label>
                        <input type="date" name="dob" style="border: 1px solid #ccc !important;" class="w-full p-2 rounded mt-1 text-gray-900" required>
                    </div>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-black font-bold py-3 rounded mt-4 hover:bg-indigo-700 shadow">
                    SAVE CUSTOMER
                </button>
            </form>
        </div>
    </div>
</x-app-layout>