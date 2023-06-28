<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food_nutrient\FoodNutrient;
use App\Models\Food_nutrient\Food;
use App\Models\Food_nutrient\Nutrient;

class FoodNutrientController extends Controller {

    public function index(Request $request) {
        if (!empty($request->get("food"))) {
            $food = $request->get("food");
            $foods = Food::where('name', 'like', '%'.$food.'%')->get();
            return view('food_nutrient.index',["foods"=>$foods]);
        }
        return view('food_nutrient.index');
    }

    public function detail($id) {
        $food_nutrients = FoodNutrient::where('food_id', '=', $id)->get();
        $food = Food::find($id);
        return view('food_nutrient.detail',array("food_nutrients"=>$food_nutrients, "food"=>$food));
    }
}