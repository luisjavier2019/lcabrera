<?php

namespace App\Core\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $connection = "pgsql";
}
