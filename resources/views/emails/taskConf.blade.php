<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Подтверждение создания задачи</title>
</head>
<body>
<h1>Вы создали задачу</h1>
<p>Название задачи: {{ $task->name }}</p>
<p>
    Статус задачи:
    @if ($task->status_id === 1)
        {{"Новая задача"}}
    @elseif ($task->status_id === 2)
    {{"Задача в работе"}}
    @elseif ($task->status_id === 3)
    {{"Задача завершена"}}
    @else
    {{"Статус не известен"}}
    @endif
</p>

</body>
</html>
