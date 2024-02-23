<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    use HasFactory;
    protected $guarded = [];
    function details()
    {
        return $this->hasMany(WhyChooseUsDetails::class, 'why_id', 'id');
    }
}
