<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content_model extends Model
{
    use HasFactory;
    protected $table = 'content';
    protected $guarded = ['id'];
}
