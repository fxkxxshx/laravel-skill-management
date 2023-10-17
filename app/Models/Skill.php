<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'name',
    ];

    protected $casts = [
        'is_experience' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
