<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'news';

    protected $fillable = [
        'name',
        'url',
        'text',
        'description',
        'img',
        'title',
        'keywords'

    ];

}
