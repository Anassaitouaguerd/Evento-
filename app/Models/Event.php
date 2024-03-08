<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'date_start',
        'adress',
        'number_place',
        'category_id',
        'user_id',
        'type',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ticket()
    {
        return $this->hasMany(UserEvent::class);
    }
}