<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataBuku extends Model
{
    public $timestamps = false;
    public $table = 'listbuku';
    protected $fillable = ['namabuku','harga'];
}
