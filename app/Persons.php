<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    protected $fillable = ['first_name', 'last_name', 'document', 'type_person'];
}
