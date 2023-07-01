<?php
namespace App\Models\Food_nutrient;

use Illuminate\Database\Eloquent\Model;

class FoodGroup extends Model {
    protected $table = "food_groups";
    public $timestamps = false;

    public function foods() {
        return $this->hasMany("App\Models\Food_nutrient\Food");
    }
}