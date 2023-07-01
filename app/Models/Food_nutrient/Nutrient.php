<?php
namespace App\Models\Food_nutrient;

use Illuminate\Database\Eloquent\Model;

class Nutrient extends Model {
    protected $table = "nutrients";
    public $timestamps = false;

    public function nutrients() {
        return $this->hasMany("App\Models\Food_nutrient\FoodNutrient");
    }

    public function unit() {
        return $this->belongsTo("App\Models\Food_nutrient\Unit");
    }
}