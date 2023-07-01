<!DOCTYPE html>
<html lang="ja">
<head>
  <title>検索ページ</title>
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
  <header>
      <h1>サイト内におけるタイトル</h1>
  </header>
  <nav>
    <ul>
      <li><a href="#">ナビ1</a></li>
      <li><a href="#">ナビ2</a></li>
      <li><a href="#">ナビ3</a></li>
      <li><a href="#">ナビ4</a></li>
    </ul>
  </nav>
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