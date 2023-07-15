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
        $food_groups = FoodGroup::all();
        // 初期ルート
        if (empty($request->get("food")) && empty($request->get("foodGroup"))) {
            return view('food_nutrient.index',["food_groups"=>$food_groups]);
        }

        // 検索条件取得
        $food_name = $request->get("food");
        $group_id = $request->get("foodGroup");
        
        if (isset($food_name) && isset($group_id)) {
            $foods = Food::where([
                ['name', 'like', '%'.$food_name.'%'],
                ['group_id', '=', $group_id]
                ])->get();
        } else if (isset($food_name)) {
            $foods = Food::where('name', 'like', '%'.$food_name.'%')->get();
        } else {
            $foods = Food::where('group_id', '=', $group_id)->get();
        }
        
        return view('food_nutrient.index',
            array(
                "foods"=>$foods,
                "food_groups"=>$food_groups,
                "request"=>$request,
                "food_name"=>$food_name,
                "group_id"=>$group_id
            ));
        // dd ($food_groups);
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