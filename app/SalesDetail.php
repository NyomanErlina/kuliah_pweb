<?php

namespace App;
use App\Traits\CompositeKey;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesDetail extends Model
{
    //use CompositeKey;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = ['nota_id', 'product_id', 'quantity', 'selling_price', 'discount', 'total_price'];
    //protected $primaryKey = ['nota_id', 'product_id' ];

 

}
