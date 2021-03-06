<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table='productCategory';

    public $primaryKey='productCategory';

    protected $fillable=[
      'description'
    ];


}
