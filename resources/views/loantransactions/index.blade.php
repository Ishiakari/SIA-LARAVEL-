<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow border">
                
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Loan Transactions</h2>
                    <a href="{{ route('loantransactions.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-black font-bold py-2 px-4 rounded shadow">
                        + New Transaction
                    </a>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                    <form action="{{ route('loantransactions.index') }}" method="GET" class="flex w-full md:w-auto">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Search Customer Name..." 
                               class="border-gray-400 border-2 rounded-l-md p-2 text-gray-900 w-full md:w-64">
                        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-r-md hover:bg-black">
                            Search
                        </button>
                    </form>

                    <a href="{{ route('transactions.pdf') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow flex items-center gap-2">
                        📄 Export PDF Report
                    </a>
                </div>

                <table class="w-full border text-left text-gray-800">
                    <thead class="bg-gray-100 font-bold">
                        <tr>
                            <th class="p-3 border">Customer Name</th>
                            <th class="p-3 border">Loan Description</th>
                            <th class="p-3 border text-center">Amount Paid</th>
                            <th class="p-3 border text-center">Date Paid</th>
                            <th class="p-3 border text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $t)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border font-semibold">{{ $t->customer->name }}</td>
                            <td class="p-3 border italic text-gray-600">{{ $t->loan->description }}</td>
                            <td class="p-3 border text-center text-green-700 font-bold">${{ number_format($t->amount_paid, 2) }}</td>
                            <td class="p-3 border text-center">{{ $t->date_paid }}</td>
                            <td class="p-3 border text-center">
                                <form action="{{ route('loantransactions.destroy', $t->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 font-bold hover:underline" onclick="return confirm('Delete this record?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500 italic">No transactions found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-6">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>