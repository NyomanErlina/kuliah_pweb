<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['nota_id','customer_id', 'user_id', 'nota_date', 'total_payment'];
    protected $primaryKey = 'nota_id';
    public $incrementing = false;


    public function product()
	{
		return $this->belongsToMany('App\Product', 'table_relashionship', 'product_id', 'nota_id');

	}




}
