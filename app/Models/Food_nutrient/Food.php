<?php
namespace App\Models\Food_nutrient;

use Illuminate\Database\Eloquent\Model;

class Food extends Model {
    protected $table = "foods";
    public $timestamps = false;

    public function foodNutrients() {
        return $this->hasMany("App\Models\Food_nutrient\FoodNutrient");
    }
}