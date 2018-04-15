<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class routineData extends Model
{
    protected $table = null;

    protected $primaryKey = "id";

    protected $fillable = [
        'room', 'subcode', 'teacher', 'time', 'day',
    ];

    public $timestamps = false;
}
