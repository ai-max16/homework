<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'title',
        'category_id',
        'priority',
        'deadline',
        'completed',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
