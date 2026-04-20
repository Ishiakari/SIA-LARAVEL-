<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'amount', 'term', 'interest', 'dategranted'];

    // This tells Laravel that one Loan can have many transactions
    public function loanTransactions()
    {
        return $this->hasMany(LoanTransaction::class);
    }
}