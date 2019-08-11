<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'web_color_id'];

    public function webColor()
    {
        return $this->belongsTo(WebColor::class);
    }

    public function tasks()
    {
        return $this->hasMany(ToDoList::class);
    }
}
