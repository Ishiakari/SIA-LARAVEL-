<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'address', 
        'gender', 
        'dob'
    ];

    // Activity 13: One Customer has many Loan Transactions
    public function loanTransactions()
    {
        return $this->hasMany(LoanTransaction::class, 'customer_id');
    }
}