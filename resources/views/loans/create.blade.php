<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded shadow-lg border">
                <h2 class="text-2xl font-bold mb-6 text-indigo-700">Add New Loan Type</h2>

                <form action="{{ route('loans.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-bold">Description</label>
                        <input type="text" name="description" class="w-full p-2 border-2 border-gray-300 rounded" placeholder="e.g., Personal Loan" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold">Amount</label>
                            <input type="number" step="0.01" name="amount" class="w-full p-2 border-2 border-gray-300 rounded" placeholder="0.00" required>
                        </div>
                        <div>
                            <label class="block font-bold">Term (Months)</label>
                            <input type="number" name="term" class="w-full p-2 border-2 border-gray-300 rounded" placeholder="12" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold">Interest Rate (%)</label>
                            <input type="number" step="0.01" name="interest" class="w-full p-2 border-2 border-gray-300 rounded" placeholder="5.0" required>
                        </div>
                        <div>
                            <label class="block font-bold">Date Granted</label>
                            <input type="date" name="dategranted" class="w-full p-2 border-2 border-gray-300 rounded" required>
                        </div>
                    </div>

                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded font-bold shadow hover:bg-indigo-700">Save Loan Type</button>
                        <a href="{{ route('loans.index') }}" class="text-gray-500 py-2 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>