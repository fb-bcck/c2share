<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReclamationType extends Model
{
    protected $table="reclamationType";
    protected $primaryKey="reclamationTypeId";

    protected $fillable=[
        'description'
    ];

}
