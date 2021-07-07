<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','rp_id','status'
    ];

    public static function getAll(){

   
        $query = RestaurantProduct::select(['restaurant_products.id','restaurant_products.name',
                                'restaurant_products.description','restaurant_products.rp_id','restaurant_products.status','restaurants.name as restaurant_name']);
        $query = $query->leftJoin('restaurants', 'restaurants.id', '=', 'restaurant_products.rp_id');
       $meeting = $query->get();
       return $meeting;
    }
}
