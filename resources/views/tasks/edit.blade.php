
<style>
    :root {
        --primary: #4f9dcc;
        --primary-dark: #3f89b5;
        --primary-light: #eaf5fb;
        --bg: #f5f9fc;
        --white: #ffffff;
        --text: #243746;
        --muted: #718493;
        --border: #dce8f0;
        --danger: #d95c5c;
        --shadow: 0 8px 25px rgba(44, 74, 94, 0.07);
    }

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        background: var(--bg);
        color: var(--text);
        font-family: Arial, Helvetica, sans-serif;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 240px;
        height: 100vh;
        background: var(--white);
        border-right: 1px solid var(--border);
        padding: 28px 18px;
        z-index: 10;
    }

    .brand {
        padding: 0 12px 28px;
        border-bottom: 1px solid var(--border);
    }

    .brand h1 {
        margin: 0;
        font-size: 21px;
        letter-spacing: 1px;
        font-weight: 700;
        color: var(--text);
    }

    .brand p {
        margin: 5px 0 0;
        font-size: 11px;
        color: var(--muted);
        letter-spacing: 0.3px;
    }

    .nav {
        margin-top: 25px;
    }

    .nav a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 13px;
        margin-bottom: 7px;
        color: var(--muted);
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        border-radius: 8px;
        transition: 0.2s ease;
    }

    .nav a:hover {
        background: var(--primary-light);
        color: var(--primary-dark);
    }

    .nav a.active {
        background: var(--primary-light);
        color: var(--primary-dark);
    }

    .nav svg {
        width: 18px;
        height: 18px;
        flex-shrink: 0;
    }

    .main {
        margin-left: 240px;
        min-height: 100vh;
        padding: 42px 45px 60px;
    }

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 30px;
    }

    .page-header h2 {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
        color: var(--text);
    }

    .page-header p {
        margin: 7px 0 0;
        color: var(--muted);
        font-size: 14px;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: #607786;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .back-button:hover {
        border-color: var(--primary);
        color: var(--primary-dark);
        background: var(--primary-light);
    }

    .form-card {
        max-width: 850px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 32px;
        box-shadow: var(--shadow);
    }

    .form-card-header {
        margin-bottom: 28px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--border);
    }

    .form-card-header h3 {
        margin: 0;
        font-size: 18px;
        color: var(--text);
    }

    .form-card-header p {
        margin: 6px 0 0;
        color: var(--muted);
        font-size: 13px;
    }

    .field {
        margin-bottom: 22px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #304a5d;
        font-size: 13px;
        font-weight: 700;
    }

    input,
    textarea,
    select {
        width: 100%;
        border: 1px solid var(--border);
        background: #f9fcfe;
        color: var(--text);
        border-radius: 8px;
        padding: 12px 14px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        outline: none;
        transition: 0.2s ease;
    }

    input::placeholder,
    textarea::placeholder {
        color: #9aabb7;
    }

    input:focus,
    textarea:focus,
    select:focus {
        border-color: var(--primary);
        background: var(--white);
        box-shadow: 0 0 0 3px rgba(79, 157, 204, 0.1);
    }

    textarea {
        min-height: 140px;
        resize: vertical;
        line-height: 1.5;
    }

    select {
        cursor: pointer;
    }

    .error {
        margin-top: 7px;
        color: var(--danger);
        font-size: 12px;
    }

    .buttons {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 30px;
        padding-top: 24px;
        border-top: 1px solid var(--border);
    }

    .back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 19px;
        background: var(--white);
        border: 1px solid var(--border);
        color: #607786;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .back:hover {
        background: #f7fafc;
        border-color: #c8d8e2;
    }

    .submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: none;
        background: var(--primary);
        color: var(--white);
        padding: 11px 20px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .submit:hover {
        background: var(--primary-dark);
    }

    .submit svg {
        width: 16px;
        height: 16px;
    }

    @media (max-width: 900px) {
        .sidebar {
            width: 210px;
        }

        .main {
            margin-left: 210px;
            padding: 35px 25px 50px;
        }
    }

    @media (max-width: 700px) {
        .sidebar {
            position: relative;
            width: 100%;
            height: auto;
            padding: 20px;
            border-right: none;
            border-bottom: 1px solid var(--border);
        }

        .brand {
            padding-bottom: 18px;
        }

        .nav {
            margin-top: 15px;
            display: flex;
            gap: 8px;
        }

        .nav a {
            margin-bottom: 0;
            flex: 1;
            justify-content: center;
        }

        .main {
            margin-left: 0;
            padding: 28px 18px 45px;
        }

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .form-card {
            padding: 24px 20px;
        }
    }

    @media (max-width: 480px) {
        .nav a {
            font-size: 12px;
            padding: 10px 8px;
        }

        .nav svg {
            width: 16px;
            height: 16px;
        }

        .page-header h2 {
            font-size: 24px;
        }

        .back-button {
            width: 100%;
            justify-content: center;
        }

        .buttons {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .back,
        .submit {
            width: 100%;
        }
    }
</style>

<aside class="sidebar">

    <div class="brand">
        <h1>TASK FLOW</h1>
        <p>Task Management System</p>
    </div>

    <nav class="nav">

        <a href="{{ route('tasks.index') }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
            </svg>
            Dashboard
        </a>

        <a href="{{ route('tasks.create') }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="9"></circle>
                <line x1="12" y1="8" x2="12" y2="16"></line>
                <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg>
            Add Task
        </a>

    </nav>

</aside>

<main class="main">

    <div class="page-header">

        <div>
            <h2>Edit Task</h2>
            <p>Update the details of your existing task.</p>
        </div>

        <a href="{{ route('tasks.index') }}" class="back-button">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Back to Dashboard
        </a>

    </div>

    <div class="form-card">

        <div class="form-card-header">
            <h3>Task Information</h3>
            <p>Update the information below and save your changes.</p>
        </div>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="field">

                <label for="task_name">
                    Task Name
                </label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ old('task_name', $task->task_name) }}"
                    placeholder="Enter your task name"
                    required
                >

                @error('task_name')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="field">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Add a short description"
                >{{ old('description', $task->description) }}</textarea>

                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="field">

                <label for="status">
                    Status
                </label>

                <select id="status" name="status" required>

                    <option value="Pending" {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed" {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>

                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="field">

                <label for="due_date">
                    Due Date
                </label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date', $task->due_date) }}"
                >

                @error('due_date')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="buttons">

                <a class="back" href="{{ route('tasks.index') }}">
                    Cancel
                </a>

                <button class="submit" type="submit">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>

                    Update Task

                </button>

            </div>

        </form>

    </div>

</main>
