<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>

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
            max-width: 1100px;
            margin: 40px auto;
        }

        .intro {
            margin-bottom: 25px;
        }

        .intro h1 {
            color: #294765;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .intro p {
            color: #77838f;
            font-size: 14px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .stat {
            background: white;
            border: 1px solid #d8dee5;
            padding: 20px;
        }

        .stat small {
            color: #78838e;
            font-size: 12px;
        }

        .stat strong {
            display: block;
            margin-top: 8px;
            color: #294765;
            font-size: 27px;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .section-title h2 {
            color: #294765;
            font-size: 19px;
        }

        .add {
            background: #416f9c;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 13px;
        }

        .tasks {
            background: white;
            border: 1px solid #d8dee5;
        }

        .task {
            display: grid;
            grid-template-columns: 2fr 2fr 120px 120px 100px;
            gap: 15px;
            padding: 17px 20px;
            border-bottom: 1px solid #e5e9ed;
            align-items: center;
        }

        .task:last-child {
            border-bottom: none;
        }

        .header {
            background: #f7f9fb;
            color: #71808d;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .name {
            font-weight: 600;
            color: #304b66;
            font-size: 14px;
        }

        .description,
        .date {
            color: #707c87;
            font-size: 13px;
        }

        .status {
            font-size: 11px;
            font-weight: 600;
        }

        .pending {
            color: #9a7127;
        }

        .completed {
            color: #3d7658;
        }

        .actions {
            display: flex;
            gap: 12px;
        }

        .actions a,
        .actions button {
            border: none;
            background: none;
            font-size: 12px;
            cursor: pointer;
            text-decoration: none;
        }

        .edit {
            color: #416f9c;
        }

        .delete {
            color: #a85d5d;
        }

        .empty {
            padding: 50px;
            text-align: center;
            color: #7d8892;
        }

        .message {
            background: #e6f1eb;
            color: #35634d;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #c8ded1;
        }

        @media (max-width: 800px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .header {
                display: none;
            }

            .task {
                grid-template-columns: 1fr;
                gap: 8px;
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

    <div class="intro">
        <h1>My Tasks</h1>
        <p>Manage your tasks and keep track of your deadlines.</p>
    </div>

    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    <section class="stats">
        <div class="stat">
            <small>TOTAL TASKS</small>
            <strong>{{ $totalTasks }}</strong>
        </div>

        <div class="stat">
            <small>PENDING</small>
            <strong>{{ $pendingTasks }}</strong>
        </div>

        <div class="stat">
            <small>COMPLETED</small>
            <strong>{{ $completedTasks }}</strong>
        </div>

        <div class="stat">
            <small>OVERDUE</small>
            <strong>{{ $overdueTasks }}</strong>
        </div>
    </section>

    <div class="section-title">
        <h2>Task List</h2>
        <a href="/tasks/create" class="add">+ Add Task</a>
    </div>

    <section class="tasks">

        <div class="task header">
            <div>Task</div>
            <div>Description</div>
            <div>Status</div>
            <div>Due Date</div>
            <div>Actions</div>
        </div>

        @forelse($tasks as $task)

            <div class="task">

                <div class="name">
                    {{ $task->task_name }}
                </div>

                <div class="description">
                    {{ $task->description ?: 'No description' }}
                </div>

                <div class="status {{ $task->status === 'Completed' ? 'completed' : 'pending' }}">
                    {{ $task->status }}
                </div>

                <div class="date">
                    {{ $task->due_date ?: 'No date' }}
                </div>

                <div class="actions">

                    <a href="{{ route('tasks.edit', $task->id) }}" class="edit">
                        Edit
                    </a>

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="delete">
                            Delete
                        </button>
                    </form>

                </div>

            </div>

        @empty

            <div class="empty">
                No tasks have been added yet.
            </div>

        @endforelse

    </section>

</main>

</body>
</html>
