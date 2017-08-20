<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Event extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'title',
        'description',
        'address',
        'lat',
        'long',
        'start_date',
        'end_date',
        'user_id',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
