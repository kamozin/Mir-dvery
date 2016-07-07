<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Products extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'products';

    protected $fillable = [
        'name',
        'url',
        'price',
        'text',
        'keywords',
        'description',
        'title',
        'id_category',
        'properties',
        'img_one',
        'img_too',

    ];

}
