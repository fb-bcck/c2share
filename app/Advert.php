<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{

    protected $table="advert";
    //
    public $primaryKey="advertId";

    protected $fillable= [
        'title','description','price','prodCategory','ownerId','tags'
    ];

    public function category(){
        return $this->belongsTo('App\ProductCategory');
    }
}
