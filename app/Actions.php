<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Actions extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'actions';

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
