<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Camp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'price'
    ];

    public function getIsRegisteredAttribute()
    {
        return Checkout::whereCampId($this->id)->whereUserId(Auth::user()->id)->exists();
    }
}
