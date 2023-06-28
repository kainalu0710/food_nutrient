<!DOCTYPE html>
<html lang="ja">
<head>
  <title>検索ページ</title>
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
  <h1>食品検索</h1>
  <!-- 検索フォームや他の要素を追加 -->
  <form method="get" action="{{ url('list') }}">
    <div>
        <input type="text" name="food">
        <button>検索</button>
    </div>
  </form>
  <?php if(!empty($foods)):?>
    <div>
      <ul>
        <?php foreach ($foods as $food):?>
            <li><a href="/food_nutrient/public/{{ $food->id }}/detail">{{ $food->name }}</a></li>
        <?php endforeach;?>
        </ul>
    </div>
  <?php endif;?>
</body>
</html>