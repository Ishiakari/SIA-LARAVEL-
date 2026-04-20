<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['loan_id', 'customer_id', 'amount_paid', 'date_paid'];

    // Connects back to the Customer table
    public function customer()
    {
        // Note: Use 'customers' if that is your model name from Activity 11
        return $this->belongsTo(customers::class, 'customer_id');
    }

    // Connects back to the Loan table
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}