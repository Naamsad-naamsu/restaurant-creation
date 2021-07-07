<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','product_limit','status'
    ];

    public static function getAll(){

        $query = Restaurant::select(['id','name','description','product_limit','status']);

       $meeting = $query->get();
       return $meeting;
    }
}
