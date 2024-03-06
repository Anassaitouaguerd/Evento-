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
        'date_start',
        'adress',
        'number_place',
        'category_id',
        'type',
        'status',
    ];
    public function categorie()
    {
        return $this->belongsTo(Categories::class);
    }
}
