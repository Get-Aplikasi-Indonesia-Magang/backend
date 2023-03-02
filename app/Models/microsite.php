<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class microsite extends Model
{
    use HasFactory;
    protected $table = "microsites";
    protected $guarded = [];
}
