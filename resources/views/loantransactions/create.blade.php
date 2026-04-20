<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded shadow-lg border">
                <h2 class="text-2xl font-bold mb-6 text-indigo-700 border-b pb-2">New Loan Transaction</h2>

                <form action="{{ route('loantransactions.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block font-bold text-gray-700">Select Customer</label>
                        <select name="customer_id" class="w-full p-2 rounded mt-1 border-gray-400 border-2 text-gray-900 bg-white" required>
                            <option value="">-- Choose a Customer --</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-gray-700">Select Loan Type</label>
                        <select name="loan_id" class="w-full p-2 rounded mt-1 border-gray-400 border-2 text-gray-900 bg-white" required>
                            <option value="">-- Choose a Loan Description --</option>
                            @foreach($loans as $loan)
                                <option value="{{ $loan->id }}">
                                    {{ $loan->description }} (Rate: {{ $loan->interest }}%)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold text-gray-700">Amount Paid</label>
                            <input type="number" step="0.01" name="amount_paid" class="w-full p-2 rounded mt-1 border-gray-400 border-2 text-gray-900" placeholder="0.00" required>
                        </div>
                        <div>
                            <label class="block font-bold text-gray-700">Date Paid</label>
                            <input type="date" name="date_paid" class="w-full p-2 rounded mt-1 border-gray-400 border-2 text-gray-900" required>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 mt-6">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded shadow">
                            Save Transaction
                        </button>
                        <a href="{{ route('loantransactions.index') }}" class="text-gray-600 hover:underline text-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>