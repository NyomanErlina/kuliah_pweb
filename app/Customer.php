<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['customer_id','first_name', 'last_name','phone', 'email','street', 'city', 'state', 'zip_code'];
    protected $primaryKey = 'customer_id';
    public $incrementing = false;
}
