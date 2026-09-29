<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $task->task_name }}</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6f8;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        a {
            display: inline-block;
            padding: 10px 16px;
            background: #222;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>{{ $task->task_name }}</h1>

    <hr>

    <h3>Description</h3>

    <p>
        {{ $task->description ?: 'No description provided.' }}
    </p>

    <h3>Status</h3>

    <p>
        {{ $task->status }}
    </p>

    <h3>Due Date</h3>

    <p>
        {{ $task->due_date ?? 'No due date' }}
    </p>

    <br>

    <a href="{{ route('tasks.edit', $task) }}">
        Edit Task
    </a>

    <a href="{{ route('tasks.index') }}">
        Back to Tasks
    </a>

</div>

</body>
</html>