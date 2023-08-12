<!DOCTYPE html>
<html lang="ja">
<head>
  <title>食品検索</title>
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
  <form method="get" action="{{ url('list') }}">
    <div>
      <select class="food__group" name=foodGroup>
        <option value="">--</option>
        <?php foreach ($food_groups as $food_group) :?>
          @if(isset($group_id))
            <option value="{{ $food_group->id }}"@if($food_group->id == $group_id) selected @endif>{{ $food_group->name }}</option>
          @else
            <option value="{{ $food_group->id }}">{{ $food_group->name }}</option>
          @endif
        <?php endforeach;?>
      </select>
    </div>
    <div>
      <input type="text" name="food" placeholder="食品名・食材名" value="@if (isset($food_name)){{ $food_name }}@endif">
    </div>
    <div>
      <button>検索</button>
    </div>
  </form>
  <?php if(isset($foods)):?>
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