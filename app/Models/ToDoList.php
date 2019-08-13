<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDoList extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'to_do_list';

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'category_id',
        'due_date',
        'end_date',
        'note',
        'is_ended',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//    public function webColor()
//    {
//        return $this->hasManyThrough(
//            WebColor::class,
//            Category::class,
//            'web_color_id',
//            'id',
//            'category_id'
//        );
//    }
}
