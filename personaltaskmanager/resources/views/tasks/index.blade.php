<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
        }

        .navbar {
            background: #222;
            color: white;
            padding: 20px 40px;
        }

        .navbar h1 {
            margin: 0;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-button {
            background: #222;
            color: white;
            padding: 12px 18px;
            text-decoration: none;
            border-radius: 6px;
        }

        .task-card {
            background: white;
            margin-top: 20px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .task-card h2 {
            margin-top: 0;
        }

        .status {
            font-weight: bold;
        }

        .pending {
            color: orange;
        }

        .completed {
            color: green;
        }

        .button {
            display: inline-block;
            padding: 8px 12px;
            background: #222;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        button {
            padding: 8px 12px;
            background: #b00020;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h1>Personal Task Manager</h1>
    </div>

    <div class="container">

        <div class="header">
            <h2>My Tasks</h2>

            <a href="{{ route('tasks.create') }}" class="add-button">
                + Add Task
            </a>
        </div>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @forelse($tasks as $task)

            <div class="task-card">

                <h2>{{ $task->task_name }}</h2>

                <p>
                    {{ $task->description }}
                </p>

                <p>
                    <strong>Status:</strong>

                    <span class="status
                        {{ $task->status == 'Completed' ? 'completed' : 'pending' }}">
                        {{ $task->status }}
                    </span>
                </p>

                <p>
                    <strong>Due Date:</strong>

                    {{ $task->due_date ?? 'No due date' }}
                </p>

                <hr>

                <a
                    href="{{ route('tasks.show', $task) }}"
                    class="button">
                    View
                </a>

                <a
                    href="{{ route('tasks.edit', $task) }}"
                    class="button">
                    Edit
                </a>

                <form
                    action="{{ route('tasks.destroy', $task) }}"
                    method="POST"
                    style="display:inline;"
                    onsubmit="return confirm('Delete this task?');"
                >

                    @csrf

                    @method('DELETE')

                    <button type="submit">
                        Delete
                    </button>

                </form>

            </div>

        @empty

            <div class="task-card">

                <h2>No Tasks Yet</h2>

                <p>
                    You don't have any tasks yet.
                    Click <strong>+ Add Task</strong> to create your first task.
                </p>

            </div>

        @endforelse

    </div>

</body>

</html>