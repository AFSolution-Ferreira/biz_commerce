<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoCar extends Model
{
    protected $table = 'auto_cars';
    protected $fillable = [
        'name',
        'image',
        'price',
        'year',
        'description',
        'automaker_id'
    ];

    public function automaker()
    {
        return $this->belongsTo(Automaker::class);
    }

    public function scopeSearch($query, $search){
        return $query->where('name', 'like','%' .$search. '%')
            ->orWhere('description', 'like', '%'.$search .'%')
            ->orWhere('year', 'like', '%'.$search .'%')
            ->orWhere('price', 'like', '%'.$search .'%');
    }
}
