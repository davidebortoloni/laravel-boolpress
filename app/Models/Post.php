<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['category_id', 'title', 'content', 'slug', 'price', 'image'];

    public function getFormattedDate($column, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->$column)->format($format);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
