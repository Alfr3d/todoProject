<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>404</title>
    {block name="css"}
      <link rel="stylesheet" href="./src/assets/css/main.css" media="all" />
    {/block}
    {block name="js"}
      <script src="./src/assets/js/main.js"></script>
    {/block}
</head>
<body>
<header>
  <div class="topnav">
    <a class="active" href="/todoWithDataBase">Home</a>
  </div>
</header>
<main>
  {*Display all tasks*}
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Active</th>
      <th>Created At</th>
      <th>Updated At</th>
    </tr>
    {foreach $tasks as $task}
      <tr>
        <td>{$task.id}</td>
        <td>{$task.name}</td>
        <td>{$task.description}</td>
        <td>{$task.active}</td>
        <td>{$task.created_at}</td>
        <td>{$task.updated_at}</td>
      </tr>
    {/foreach}
  </table>
</main>
</body>
</html>
