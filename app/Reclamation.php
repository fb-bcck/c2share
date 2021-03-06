<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $table="reclamation";
    public $primaryKey="reclamationId";

    public $fillable=[
        'type','ownerId','buyerId','advertId','historyId','description','reclamationStatus'
    ];
}
