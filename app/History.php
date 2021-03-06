<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table="history";

    public $primaryKey="historyId";

    protected $fillable=[
        'title','description','sellerId','buyerId'
    ];
}
