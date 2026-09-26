<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task Flow Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #4f9dcc;
            --primary-dark: #397fa9;
            --primary-light: #eaf5fb;
            --background: #f5f9fc;
            --white: #ffffff;
            --text-dark: #243b4a;
            --text: #496170;
            --text-light: #7b8c98;
            --border: #dce8ef;
            --success-bg: #e8f5ed;
            --success-text: #3f805b;
            --warning-bg: #fff4dc;
            --warning-text: #a87518;
            --danger-bg: #fdebed;
            --danger-text: #bd5b64;
            --shadow: 0 8px 25px rgba(54, 92, 116, 0.06);
        }

        body {
            margin: 0;
            background: var(--background);
            color: var(--text-dark);
            font-family: Arial, Helvetica, sans-serif;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: var(--white);
            border-right: 1px solid var(--border);
            padding: 30px 20px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            z-index: 10;
        }

        .brand {
            font-family: Georgia, "Times New Roman", serif;
            font-size: 23px;
            letter-spacing: 1.5px;
            font-weight: 600;
            color: #2d6f9f;
            padding: 0 12px;
            margin-bottom: 45px;
        }

        .brand-subtitle {
            display: block;
            margin-top: 5px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            letter-spacing: 0.5px;
            color: #9aabb5;
            font-weight: 400;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #647985;
            font-size: 14px;
            font-weight: 600;
            padding: 13px 14px;
            border-radius: 9px;
            transition: all 0.2s ease;
        }

        .menu a:hover {
            background: #f0f7fb;
            color: var(--primary-dark);
        }

        .menu a.active {
            background: var(--primary-light);
            color: #2875a8;
        }

        .menu-icon {
            width: 18px;
            height: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .menu-icon svg {
            width: 17px;
            height: 17px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 18px 12px 5px;
            color: #a0adb6;
            font-size: 11px;
            line-height: 1.5;
        }

        .content {
            margin-left: 240px;
            width: calc(100% - 240px);
            padding: 42px 50px 60px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            margin-bottom: 35px;
        }

        .welcome h1 {
            margin: 0;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 35px;
            font-weight: 500;
            color: #263f52;
        }

        .welcome p {
            margin: 7px 0 0;
            color: var(--text-light);
            font-size: 13px;
        }

        .add-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            padding: 12px 19px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(76, 145, 188, 0.16);
            transition: all 0.2s ease;
        }

        .add-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .message {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--success-bg);
            border: 1px solid #cee5d7;
            color: var(--success-text);
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .message-icon {
            font-weight: bold;
            font-size: 15px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 21px 22px;
            box-shadow: var(--shadow);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(54, 92, 116, 0.09);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-label {
            color: #718493;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .stat-number {
            margin-top: 12px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 32px;
            color: #2c526d;
        }

        .stat-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon svg {
            width: 17px;
            height: 17px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .icon-total {
            background: #eaf5fb;
            color: #4f9dcc;
        }

        .icon-pending {
            background: #fff4dc;
            color: #c58b24;
        }

        .icon-completed {
            background: #e8f5ed;
            color: #4f8c67;
        }

        .icon-overdue {
            background: #fdebed;
            color: #c56770;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 17px;
        }

        .section-title h2 {
            margin: 0;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 24px;
            font-weight: 500;
            color: #29475b;
        }

        .section-title p {
            margin: 5px 0 0;
            color: var(--text-light);
            font-size: 12px;
        }

        .section-header > a {
            color: #428dbb;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }

        .section-header > a:hover {
            color: var(--primary-dark);
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 14px;
        }

        .search-box {
            position: relative;
            flex: 1;
            max-width: 430px;
        }

        .search-box svg {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            stroke: #8b9aa3;
            fill: none;
            stroke-width: 2;
        }

        .search-box input {
            width: 100%;
            padding: 11px 14px 11px 38px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            color: var(--text-dark);
            font-size: 13px;
            outline: none;
            transition: border 0.2s ease, box-shadow 0.2s ease;
        }

        .search-box input:focus {
            border-color: #8fc6e4;
            box-shadow: 0 0 0 3px rgba(79, 157, 204, 0.09);
        }

        .filter-select {
            padding: 11px 35px 11px 13px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            color: var(--text);
            font-size: 13px;
            outline: none;
            cursor: pointer;
        }

        .filter-select:focus {
            border-color: #8fc6e4;
        }

        .task-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .task-header,
        .task-row {
            display: grid;
            grid-template-columns: 1.5fr 2fr 1fr 1.2fr 0.9fr;
            gap: 20px;
            align-items: center;
            padding: 17px 22px;
        }

        .task-header {
            background: #f8fbfd;
            color: #78909f;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .task-row {
            min-height: 76px;
            border-top: 1px solid #edf2f5;
            transition: background 0.15s ease;
        }

        .task-row:hover {
            background: #fbfdfe;
        }

        .task-name {
            font-size: 14px;
            font-weight: 700;
            color: #304a5d;
            word-break: break-word;
        }

        .description {
            color: #788995;
            font-size: 13px;
            line-height: 1.4;
            word-break: break-word;
        }

        .date {
            color: #607786;
            font-size: 13px;
        }

        .date.overdue-date {
            color: var(--danger-text);
            font-weight: 700;
        }

        .date.no-date {
            color: #a0adb5;
            font-style: italic;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .pending {
            background: #e7f3fb;
            color: #377ca6;
        }

        .completed {
            background: var(--success-bg);
            color: var(--success-text);
        }

        .overdue {
            background: var(--danger-bg);
            color: var(--danger-text);
        }

        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .action-button {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            border: 1px solid transparent;
            background: transparent;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .action-button svg {
            width: 15px;
            height: 15px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .edit {
            color: #4d7188;
        }

        .edit:hover {
            background: #edf5f9;
            border-color: #dbeaf1;
        }

        .delete {
            color: #c46b72;
        }

        .delete:hover {
            background: #fff0f1;
            border-color: #f3dadd;
        }

        .actions form {
            margin: 0;
        }

        .empty {
            text-align: center;
            padding: 70px 20px;
            color: #82919b;
        }

        .empty-icon {
            width: 50px;
            height: 50px;
            margin: 0 auto 15px;
            border-radius: 12px;
            background: #eef6fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #76aecb;
        }

        .empty-icon svg {
            width: 24px;
            height: 24px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.7;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .empty h3 {
            margin: 0 0 6px;
            color: #496170;
            font-size: 16px;
        }

        .empty p {
            margin: 0 0 18px;
            color: #8a99a2;
            font-size: 13px;
        }

        .empty-button {
            display: inline-flex;
            align-items: center;
            padding: 10px 15px;
            background: var(--primary);
            color: white;
            border-radius: 7px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
        }

        .empty-button:hover {
            background: var(--primary-dark);
        }

        .no-results {
            display: none;
            text-align: center;
            padding: 40px 20px;
            color: #8a99a2;
            font-size: 13px;
        }

        @media (max-width: 1100px) {

            .sidebar {
                width: 210px;
            }

            .content {
                margin-left: 210px;
                width: calc(100% - 210px);
                padding: 35px 30px 50px;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .task-card {
                overflow-x: auto;
            }

            .task-header,
            .task-row {
                min-width: 900px;
            }
        }

        @media (max-width: 700px) {

            .layout {
                display: block;
            }

            .sidebar {
                position: static;
                width: 100%;
                padding: 20px;
                border-right: none;
                border-bottom: 1px solid var(--border);
            }

            .brand {
                margin-bottom: 20px;
            }

            .brand-subtitle {
                display: none;
            }

            .menu {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .menu a {
                padding: 10px 12px;
            }

            .sidebar-bottom {
                display: none;
            }

            .content {
                margin-left: 0;
                width: 100%;
                padding: 30px 20px 50px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                margin-bottom: 30px;
            }

            .welcome h1 {
                font-size: 30px;
            }

            .add-button {
                width: 100%;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .section-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .toolbar {
                align-items: stretch;
                flex-direction: column;
            }

            .search-box {
                max-width: none;
            }

            .filter-select {
                width: 100%;
            }

            .task-card {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <aside class="sidebar">

        <div class="brand">
            TASK FLOW
            <span class="brand-subtitle">Task Management System</span>
        </div>

        <nav class="menu">

            <a href="{{ route('tasks.index') }}" class="active">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                    </svg>
                </span>

                Dashboard

            </a>

            <a href="{{ route('tasks.create') }}">

                <span class="menu-icon">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9"></circle>
                        <line x1="12" y1="8" x2="12" y2="16"></line>
                        <line x1="8" y1="12" x2="16" y2="12"></line>
                    </svg>
                </span>

                Add Task

            </a>

        </nav>

        <div class="sidebar-bottom">
            Task management made simple.
        </div>

    </aside>

    <main class="content">

        @if(session('success'))

            <div class="message">

                <span class="message-icon">✓</span>

                <span>{{ session('success') }}</span>

            </div>

        @endif

        <div class="topbar">

            <div class="welcome">

                <h1>Dashboard</h1>

                <p>Manage your tasks and keep track of your progress.</p>

            </div>

            <a href="{{ route('tasks.create') }}" class="add-button">
                <span>＋</span>
                Add Task
            </a>

        </div>

        <section class="stats">

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-label">
                        Total Tasks
                    </div>

                    <div class="stat-icon icon-total">

                        <svg viewBox="0 0 24 24">
                            <path d="M8 6h13"></path>
                            <path d="M8 12h13"></path>
                            <path d="M8 18h13"></path>
                            <path d="M3 6h.01"></path>
                            <path d="M3 12h.01"></path>
                            <path d="M3 18h.01"></path>
                        </svg>

                    </div>

                </div>

                <div class="stat-number">
                    {{ $totalTasks }}
                </div>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-label">
                        Pending
                    </div>

                    <div class="stat-icon icon-pending">

                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9"></circle>
                            <polyline points="12 7 12 12 15 14"></polyline>
                        </svg>

                    </div>

                </div>

                <div class="stat-number">
                    {{ $pendingTasks }}
                </div>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-label">
                        Completed
                    </div>

                    <div class="stat-icon icon-completed">

                        <svg viewBox="0 0 24 24">
                            <polyline points="5 12 10 17 19 7"></polyline>
                        </svg>

                    </div>

                </div>

                <div class="stat-number">
                    {{ $completedTasks }}
                </div>

            </div>

            <div class="stat-card">

                <div class="stat-top">

                    <div class="stat-label">
                        Overdue
                    </div>

                    <div class="stat-icon icon-overdue">

                        <svg viewBox="0 0 24 24">
                            <path d="M10.3 3.7L2.8 17a2 2 0 001.7 3h15a2 2 0 001.7-3L13.7 3.7a2 2 0 00-3.4 0z"></path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>

                    </div>

                </div>

                <div class="stat-number">
                    {{ $overdueTasks }}
                </div>

            </div>

        </section>

        <div class="section-header">

            <div class="section-title">

                <h2>Recent Tasks</h2>

                <p>View and manage your latest tasks.</p>

            </div>

            <a href="{{ route('tasks.create') }}">
                + Add New Task
            </a>

        </div>

        <div class="toolbar">

            <div class="search-box">

                <svg viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="7"></circle>
                    <line x1="16" y1="16" x2="21" y2="21"></line>
                </svg>

                <input
                    type="text"
                    id="taskSearch"
                    placeholder="Search tasks..."
                >

            </div>

            <select id="statusFilter" class="filter-select">

                <option value="all">
                    All Status
                </option>

                <option value="pending">
                    Pending
                </option>

                <option value="completed">
                    Completed
                </option>

                <option value="overdue">
                    Overdue
                </option>

            </select>

        </div>

        <section class="task-card">

            @if($tasks->count())

                <div class="task-header">

                    <div>Task</div>
                    <div>Description</div>
                    <div>Status</div>
                    <div>Due Date</div>
                    <div>Actions</div>

                </div>

                <div id="taskList">

                    @foreach($tasks as $task)

                        @php

                            $isCompleted = $task->status === 'Completed';

                            $isOverdue = false;

                            if ($task->due_date && !$isCompleted) {
                                $isOverdue = \Carbon\Carbon::parse($task->due_date)
                                    ->startOfDay()
                                    ->isBefore(now()->startOfDay());
                            }

                            if ($isCompleted) {
                                $statusClass = 'completed';
                                $statusFilter = 'completed';
                            } elseif ($isOverdue) {
                                $statusClass = 'overdue';
                                $statusFilter = 'overdue';
                            } else {
                                $statusClass = 'pending';
                                $statusFilter = 'pending';
                            }

                        @endphp

                        <div
                            class="task-row task-item"
                            data-status="{{ $statusFilter }}"
                            data-search="{{ strtolower($task->task_name . ' ' . ($task->description ?: '')) }}"
                        >

                            <div class="task-name">
                                {{ $task->task_name }}
                            </div>

                            <div class="description">
                                {{ $task->description ?: 'No description' }}
                            </div>

                            <div>

                                <span class="status {{ $statusClass }}">

                                    <span class="status-dot"></span>

                                    @if($isOverdue)
                                        Overdue
                                    @else
                                        {{ $task->status }}
                                    @endif

                                </span>

                            </div>

                            <div class="
                                date
                                {{ $isOverdue ? 'overdue-date' : '' }}
                                {{ !$task->due_date ? 'no-date' : '' }}
                            ">

                                @if($task->due_date)

                                    {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}

                                @else

                                    No due date

                                @endif

                            </div>

                            <div class="actions">

                                <a
                                    href="{{ route('tasks.edit', $task) }}"
                                    class="action-button edit"
                                    title="Edit Task"
                                >

                                    <svg viewBox="0 0 24 24">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.1 2.1 0 013 3L8 18l-4 1 1-4L16.5 3.5z"></path>
                                    </svg>

                                </a>

                                <form
                                    action="{{ route('tasks.destroy', $task) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-button delete"
                                        title="Delete Task"
                                        onclick="return confirm('Are you sure you want to delete this task?')"
                                    >

                                        <svg viewBox="0 0 24 24">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6l-1 14H6L5 6"></path>
                                            <path d="M10 11v5"></path>
                                            <path d="M14 11v5"></path>
                                            <path d="M9 6V4h6v2"></path>
                                        </svg>

                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

                <div class="no-results" id="noResults">
                    No tasks match your search.
                </div>

            @else

                <div class="empty">

                    <div class="empty-icon">

                        <svg viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="8" y1="13" x2="16" y2="13"></line>
                            <line x1="8" y1="17" x2="13" y2="17"></line>
                        </svg>

                    </div>

                    <h3>No tasks yet</h3>

                    <p>
                        Start organizing your work by creating your first task.
                    </p>

                    <a
                        href="{{ route('tasks.create') }}"
                        class="empty-button"
                    >
                        + Create Your First Task
                    </a>

                </div>

            @endif

        </section>

    </main>

</div>

<script>

    const searchInput = document.getElementById('taskSearch');
    const statusFilter = document.getElementById('statusFilter');
    const taskItems = document.querySelectorAll('.task-item');
    const noResults = document.getElementById('noResults');

    function filterTasks() {

        const searchValue = searchInput
            ? searchInput.value.toLowerCase().trim()
            : '';

        const statusValue = statusFilter
            ? statusFilter.value
            : 'all';

        let visibleCount = 0;

        taskItems.forEach(function(task) {

            const taskText = task.dataset.search || '';
            const taskStatus = task.dataset.status || '';

            const matchesSearch =
                taskText.includes(searchValue);

            const matchesStatus =
                statusValue === 'all' ||
                taskStatus === statusValue;

            if (matchesSearch && matchesStatus) {

                task.style.display = 'grid';

                visibleCount++;

            } else {

                task.style.display = 'none';

            }

        });

        if (noResults) {

            noResults.style.display =
                visibleCount === 0 ? 'block' : 'none';

        }

    }

    if (searchInput) {
        searchInput.addEventListener('input', filterTasks);
    }

    if (statusFilter) {
        statusFilter.addEventListener('change', filterTasks);
    }

</script>

</body>
</html>