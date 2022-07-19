<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkouts extends Model
{
    use HasFactory;
    protected $fillable = ['checkout_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
