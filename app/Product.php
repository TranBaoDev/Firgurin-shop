<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'product_name','category_id','brand_id','product_desc','product_size','product_price','product_image','product_status','product_propotion','product_date','product_price_update'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'tbl_product';
}
