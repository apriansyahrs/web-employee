<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessEntity extends Model
{
    use SoftDeletes;

    protected $table = 'business_entities';

    protected $fillable = ['name'];
}
