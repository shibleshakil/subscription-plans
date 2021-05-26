<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateSubscription extends Model
{
    use HasFactory;

    protected $table = "create_subscriptions";

    protected $fillable =[
        'name', 'price', 'interest_rate', 'total_earning', 'start_date', 'bill_type', 'maturity_date'
    ];
}
