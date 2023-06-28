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
      <p>食品番号：{{ $food->id }}</p>
      <p>食品名：{{ $food->name }}</p>
    </section>
  </article>
  <!-- 各項目と単位の表示を繰り返し -->
  
</body>
</html>
