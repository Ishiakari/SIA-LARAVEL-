<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded shadow-lg border">
                <h2 class="text-2xl font-bold mb-6 text-indigo-700 border-b pb-2">Edit Transaction #{{ $transaction->id }}</h2>

                <form action="{{ route('loantransactions.update', $transaction->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-bold text-gray-700">Customer</label>
                        <select name="customer_id" class="w-full p-2 rounded mt-1 border-gray-400 border-2 text-gray-900 bg-white">
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ $transaction->customer_id == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-gray-700">Loan Type</label>
                        <select name="loan_id" class="w-full p-2 rounded mt-1 border-gray-400 border-2 text-gray-900 bg-white">
                            @foreach($loans as $loan)
                                <option value="{{ $loan->id }}" {{ $transaction->loan_id == $loan->id ? 'selected' : '' }}>
                                    {{ $loan->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold text-gray-700">Amount Paid</label>
                            <input type="number" step="0.01" name="amount_paid" value="{{ $transaction->amount_paid }}" class="w-full p-2 rounded mt-1 border-gray-400 border-2 text-gray-900">
                        </div>
                        <div>
                            <label class="block font-bold text-gray-700">Date Paid</label>
                            <input type="date" name="date_paid" value="{{ $transaction->date_paid }}" class="w-full p-2 rounded mt-1 border-gray-400 border-2 text-gray-900">
                        </div>
                    </div>

                    <div class="mt-6 flex gap-4">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded shadow">
                            Update Transaction
                        </button>
                        <a href="{{ route('loantransactions.index') }}" class="text-gray-500 hover:underline">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>