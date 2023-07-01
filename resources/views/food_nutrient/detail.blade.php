<!DOCTYPE html>
<html lang="ja">
<head>
  <title>詳細ページ</title>
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
  <article>
    <h1>詳細ページ</h1>
    <section>
      <p>食品番号：{{ sprintf('%05d', $food->id) }}</p>
      <p>食品名：{{ $food->name }}</p>
      <table>
        <thead>
          <tr>
            <th>成分名</th>
            <th>単位</th>
            <th>含有量</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($food_nutrients as $food_nutrient):?>
            <tr>
              <td>{{$food_nutrient->nutrient->name}}</td>
              <td>{{$food_nutrient->nutrient->unit->abbreviation}}</td>
              <?php if($food_nutrient->nutrient_symbol):?>
                <td>{{$food_nutrient->is_estimation === 1 ? '('. $food_nutrient->nutrient_symbol .')' : $food_nutrient->nutrient_symbol }}</td>
              <?php else:?>
                <td>{{$food_nutrient->is_estimation === 1 ? '('. $food_nutrient->amount .')' : $food_nutrient->amount }}</td>
              <?php endif?>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </section>
  </article>
  <!-- 各項目と単位の表示を繰り返し -->
  
</body>
</html>
