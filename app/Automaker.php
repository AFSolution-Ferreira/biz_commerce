<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automaker extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description'
    ];

    public function auto_car(){
        return $this->hasMany(AutoCar::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' .$search .'%')
            ->orWhere('description', 'like', '%' .$search .'%');
    }

}
