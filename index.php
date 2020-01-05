<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/Todo.php');

$todoApp = new \MyApp\Todo();
$todos = $todoApp->getAll(); // Todoを全件取得

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>My Todos</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div id="container">
    <h1>Todos</h1>
    <form action="">
      <input type="text" id="new_todo" placeholder="What needs to be done?">
    </form>
    <ul>
      <!-- 全件取得したTodoを1件ずつ表示。stateが1の場合はcheck,doneクラスを与えてCSSを適用 -->
      <?php foreach ($todos as $todo) : ?>
      <li>
        <input type="checkbox" <?php if ($todo->state === '1') { echo 'checked'; } ?>>
        <span class="<?php if ($todo->state === '1') { echo 'done'; } ?>"><?= h($todo->title); ?></span>
        <div class="delete_todo">x</div>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
</body>
</html>