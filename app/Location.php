<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $incrementing = true;
    protected $table = 'locations';
    protected $primaryKey = 'location_id';
}
