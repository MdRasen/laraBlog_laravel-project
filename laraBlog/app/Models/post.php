<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\category;
use App\Models\user;
use App\Models\comment;


class post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable =
    [
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'created_by'
    ];

    public function category(){
        return $this->belongsTo(category::class, 'category_id', 'id');
    }

    public function user(){
        return $this->belongsTo(user::class, 'created_by', 'id');
    }

    public function comments(){
        return $this->hasMany(comment::class, 'post_id', 'id');
    }
}
