<!DOCTYPE html>
<html>
<head>
    <title>Loan Transactions Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #4f46e5; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; }
        th { background-color: #4f46e5; color: white; padding: 10px; text-align: left; }
        td { border: 1px solid #ddd; padding: 8px; }
        .footer { margin-top: 20px; font-size: 10px; text-align: right; font-style: italic; }
        .total-row { font-weight: bold; background-color: #f9fafb; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Loan Transactions Report</h1>
        <p>Generated on: {{ date('F d, Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Loan Description</th>
                <th>Amount Paid</th>
                <th>Date Paid</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($transactions as $t)
            <tr>
                <td>{{ $t->customer->name }}</td>
                <td>{{ $t->loan->description }}</td>
                <td>${{ number_format($t->amount_paid, 2) }}</td>
                <td>{{ $t->date_paid }}</td>
            </tr>
            @php $total += $t->amount_paid; @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="2" style="text-align: right;">Total Collections:</td>
                <td colspan="2">${{ number_format($total, 2) }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        System Generated Report - Zach Alfred
    </div>

</body>
</html>