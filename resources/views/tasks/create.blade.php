<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task - Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #eef2f6;
            color: #263238;
        }

        .topbar {
            background: #ffffff;
            border-bottom: 1px solid #d8dee5;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 20px;
            font-weight: 700;
            color: #294765;
        }

        nav a {
            margin-left: 24px;
            text-decoration: none;
            color: #52606d;
            font-size: 14px;
        }

        .page {
            width: 86%;
            max-width: 760px;
            margin: 50px auto;
        }

        .heading {
            margin-bottom: 25px;
        }

        .heading h1 {
            color: #294765;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .heading p {
            color: #77838f;
            font-size: 14px;
        }

        .form-card {
            background: #ffffff;
            border: 1px solid #d8dee5;
            padding: 30px;
        }

        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #465766;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            border: 1px solid #cbd3da;
            padding: 12px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #263238;
            background: #ffffff;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #416f9c;
        }

        .error {
            margin-bottom: 20px;
            padding: 12px;
            background: #f8e8e8;
            border: 1px solid #e1c5c5;
            color: #8a4f4f;
            font-size: 13px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }

        .button {
            border: none;
            padding: 11px 18px;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
        }

        .submit {
            background: #416f9c;
            color: white;
        }

        .back {
            background: #e7ebef;
            color: #52606d;
        }

        @media (max-width: 600px) {
            .topbar {
                padding: 18px 5%;
            }

            nav a {
                margin-left: 12px;
            }

            .page {
                width: 90%;
                margin: 35px auto;
            }

            .form-card {
                padding: 22px;
            }
        }
    </style>
</head>

<body>

<header class="topbar">
    <div class="brand">TASK MANAGER</div>

    <nav>
        <a href="/tasks">Tasks</a>
        <a href="/tasks/create">Add Task</a>
    </nav>
</header>

<main class="page">

    <div class="heading">
        <h1>Add Task</h1>
        <p>Create a new task and keep track of your work.</p>
    </div>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST" class="form-card">

        @csrf

        <div class="field">
            <label for="task_name">Task Name</label>
            <input
                type="text"
                id="task_name"
                name="task_name"
                value="{{ old('task_name') }}"
                required
            >
        </div>

        <div class="field">
            <label for="description">Description</label>
            <textarea
                id="description"
                name="description"
            >{{ old('description') }}</textarea>
        </div>

        <div class="field">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>
                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>
            </select>
        </div>

        <div class="field">
            <label for="due_date">Due Date</label>
            <input
                type="date"
                id="due_date"
                name="due_date"
                value="{{ old('due_date') }}"
            >
        </div>

        <div class="actions">
            <button type="submit" class="button submit">
                Add Task
            </button>

            <a href="/tasks" class="button back">
                Back
            </a>
        </div>

    </form>

</main>

</body>
</html>
