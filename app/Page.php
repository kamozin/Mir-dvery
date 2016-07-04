<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'page';

    protected $fillable = [
        'name',
        'url',
        'text',
        'description',
        'keywords'
    ];

}
