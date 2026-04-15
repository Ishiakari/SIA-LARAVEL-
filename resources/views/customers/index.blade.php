<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Customer Records</h2>
                    <a href="{{ route('customers.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-black font-bold py-2 px-4 rounded shadow">
                        + Add Customer
                    </a>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                    <form action="{{ route('customers.index') }}" method="GET" class="flex w-full md:w-auto">
                        <input type="text" name="search" value="{{ request('search') }}" 
                                placeholder="Search name or address..." 
                                class="border-gray-300 rounded-l-md p-2 text-gray-900 border w-full md:w-64 focus:ring-indigo-500">
                        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-r-md hover:bg-black transition">
                            Search
                        </button>
                    </form>

                    <a href="{{ route('customers.export') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow flex items-center gap-2">
                        <span>📄</span> Export PDF
                    </a>
                </div>

                <table class="w-full border text-left text-gray-800">
                    <thead class="bg-gray-100 font-bold">
                        <tr>
                            <th class="p-3 border">Name</th>
                            <th class="p-3 border text-center">Gender</th>
                            <th class="p-3 border">Birth Date</th>
                            <th class="p-3 border text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $c)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border">{{ $c->name }}</td>
                            <td class="p-3 border text-center">{{ $c->gender }}</td>
                            <td class="p-3 border">{{ $c->dob }}</td>
                            <td class="p-3 border text-center">
                                <a href="{{ route('customers.edit', $c->id) }}" class="text-blue-600 font-bold hover:underline">Edit</a>
                                <form action="{{ route('customers.destroy', $c->id) }}" method="POST" class="inline ml-2">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 font-bold hover:underline" onclick="return confirm('Confirm Delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-6">
                    {{ $customers->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>