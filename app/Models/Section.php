<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function meals()
    {
        return $this->hasMany(Meal::class,'section_id');
    }
}
