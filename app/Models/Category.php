<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'color_id'];

    public function color()
    {
        return $this->belongsTo(WebColor::class);
    }

    public function tasks()
    {
        return $this->hasMany(ToDoList::class);
    }
}
