<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table="inquiry";

    public $primaryKey="inquiryId";

    protected $fillable=[
        'text','advertId','ownerId','buyerId'
    ];
}
