<x-app-layout>
    <div class="py-12">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Customer</h2>
            
            <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT') {{-- This is required for updates --}}

                <div>
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" value="{{ $customer->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-gray-900 p-2 border" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea name="address" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-gray-900 p-2 border" required>{{ $customer->address }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Gender</label>
                        <select name="gender" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-gray-900 p-2 border">
                            <option value="Male" {{ $customer->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $customer->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input type="date" name="dob" value="{{ $customer->dob }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-gray-900 p-2 border" required>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow">
                        Update Customer Record
                    </button>
                    <a href="{{ route('customers.index') }}" class="block text-center mt-2 text-sm text-gray-600 hover:underline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>