<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';

    protected $fillable = [
        'user_id', 'create_subscription_id',
    ];

    public function create_subscription()
    {
        return $this->belongsTo(CreateSubscription::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
