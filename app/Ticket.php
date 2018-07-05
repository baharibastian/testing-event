<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'event_tickets';
    public $incrementing = true;
    protected $primaryKey = 'ticket_id';
}
