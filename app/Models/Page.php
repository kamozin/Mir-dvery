<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
class Page extends Model
{
    use SoftDeletes;


    protected $table = 'page';
    protected $fillable = ['name', 'url', 'text', 'description', 'keywords'];
    protected $dates = ['deleted_at'];



}