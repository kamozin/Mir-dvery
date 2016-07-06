<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class characteristics extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'im';

    protected $fillable = [
        'name',
        'img',
        'id_directory',
        'id_razdel'


    ];

}
