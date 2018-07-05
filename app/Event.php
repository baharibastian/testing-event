<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $incrementing = true;
    protected $table = 'events';
    protected $primaryKey = 'event_id';
}
