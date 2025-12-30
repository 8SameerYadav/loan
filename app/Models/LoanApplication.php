<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    protected $fillable = [
        'mobile',
        'agreed',
        'full_name',
        'email',
        'gender',
        'pan',
        'dob',
        'pincode',
        'income',
        'occupation',
        'company_type',
        'loan_purpose',
        'ownership',
        'statement_path'
    ];
}
