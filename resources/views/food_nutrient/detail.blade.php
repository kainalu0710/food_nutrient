<!DOCTYPE html>
<html lang="ja">
<head>
  <title>詳細ページ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
  <header>
      <h1>食品管理サイト</h1>
  </header>
  <nav>
    <ul>
      <li><a href="{{ asset('/list') }}">食品検索</a></li>
      <li><a href="#">栄養計算</a></li>
      <li><a href="#">レシピ・献立</a></li>
    </ul>
  </nav>
  <article>
    <section>
      <div>
        <h2>食品詳細</h2>
        <div class="food__detail">
          <p>食品番号：{{ sprintf('%05d', $food->id) }}</p>
          <p>食品群：{{ $food_group->name }}</p>
          <p>食品名：{{ $food->name }}</p>
        </div>
        <table>
          <thead class="detail__thead__status">
            <tr>
              <th>成分名</th>
              <th>単位</th>
              <th>含有量</th>
            </tr>
          </thead>
          <tbody  class="detail__tbody__status">
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
      </div>
    </section>
  </article>
  <!-- 各項目と単位の表示を繰り返し -->
  
</body>
</html>
