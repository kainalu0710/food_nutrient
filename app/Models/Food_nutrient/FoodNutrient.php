<?php
namespace App\Models\Food_nutrient;

use Illuminate\Database\Eloquent\Model;

class FoodNutrient extends Model {
    protected $table = "food_nutrients";
    public $timestamps = false;

    public function food() {
        return $this->belongsTo("App\Models\Food_nutrient\Food");
    }

    public function nutrient() {
        return $this->belongsTo("App\Models\Food_nutrient\Nutrient");
    }
}