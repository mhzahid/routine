<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class infoInsert extends Model
{
    protected $table = "comments";

    protected $primaryKey = "id";

    protected $fillable = [
        'room', 'subcode', 'teacher', 'time', 'day',
    ];

    public $timestamps = false;
}
