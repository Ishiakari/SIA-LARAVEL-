<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black p-6 rounded shadow border">
                
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Loan Master List</h2>
                    <a href="{{ route('loans.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-black font-bold py-2 px-4 rounded shadow">
                        + Add New Loan Type
                    </a>
                </div>

                <table class="w-full border text-left text-gray-800">
                    <thead class="bg-gray-100 font-bold">
                        <tr>
                            <th class="p-3 border">Description</th>
                            <th class="p-3 border text-center">Amount</th>
                            <th class="p-3 border text-center">Term (Months)</th>
                            <th class="p-3 border text-center">Interest</th>
                            <th class="p-3 border text-center">Date Granted</th>
                            <th class="p-3 border text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($loans as $loan)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border font-medium">{{ $loan->description }}</td>
                            <td class="p-3 border text-center">${{ number_format($loan->amount, 2) }}</td>
                            <td class="p-3 border text-center">{{ $loan->term }}</td>
                            <td class="p-3 border text-center text-blue-600 font-bold">{{ $loan->interest }}%</td>
                            <td class="p-3 border text-center">{{ $loan->dategranted }}</td>
                            <td class="p-3 border text-center">
                                <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline" onclick="return confirm('Delete this loan type?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-500 italic">No loan types defined.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>