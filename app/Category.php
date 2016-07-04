<?php

namespace App;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'category';

    protected $fillable = [
        'name', 'url', 'parent_id', 'text', 'img'
    ];

}
