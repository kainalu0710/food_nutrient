<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food_nutrient\FoodNutrient;
use App\Models\Food_nutrient\Food;
use App\Models\Food_nutrient\FoodGroup;
use App\Models\Food_nutrient\Nutrient;
use App\Models\Food_nutrient\Unit;

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
        // 食品成分テーブルからfood_idで該当データの取得
        $food_nutrients = FoodNutrient::where('food_id', '=', $id)->get();
        // 食品テーブルから食品データの取得
        $food = Food::where('id', '=', $id)->first();
        // 食品データから食品群データの取得
        $group = $food->group_id;
        $food_group = FoodGroup::find($food->group_id);
        
        return view('food_nutrient.detail',array(
            "food_nutrients"=>$food_nutrients, 
            "food"=>$food, 
            "food_group"=>$food_group
        ));
    }
}