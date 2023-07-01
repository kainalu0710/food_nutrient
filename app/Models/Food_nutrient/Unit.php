<?php
namespace App\Models\Food_nutrient;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model {
    protected $table = "units";
    public $timestamps = false;

    public function untits() {
        return $this->hasMany("App\Models\Food_nutrinet\Nutrient");
    }
}