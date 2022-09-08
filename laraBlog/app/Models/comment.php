<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable =
    [
        'post_id',
        'name',
        'email',
        'comment'
    ];
}
