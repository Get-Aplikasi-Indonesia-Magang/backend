<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ContentController;
class content extends Model
{
    use HasFactory;
    protected $table = "content";
    protected $guarded = [];
}
