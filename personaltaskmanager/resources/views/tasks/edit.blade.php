<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6f8;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px;
            box-sizing: border-box;
        }

        button,
        a {
            padding: 10px 16px;
            background: #222;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Task</h1>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('tasks.update', $task) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <label>Task Name</label>

        <input
            type="text"
            name="task_name"
            value="{{ old('task_name', $task->task_name) }}"
            required
        >

        <label>Description</label>

        <textarea
            name="description"
            rows="5"
        >{{ old('description', $task->description) }}</textarea>

        <label>Status</label>

        <select name="status">

            <option value="Pending"
                {{ $task->status == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ $task->status == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>

        </select>

        <label>Due Date</label>

        <input
            type="date"
            name="due_date"
            value="{{ old('due_date', $task->due_date) }}"
        >

        <button type="submit">
            Update Task
        </button>

        <a href="{{ route('tasks.index') }}">
            Cancel
        </a>

    </form>

</div>

</body>
</html>