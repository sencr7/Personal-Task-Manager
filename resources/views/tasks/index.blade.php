<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/images/messi-e-ronaldo-4k.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            color: #1f2937;
            min-height: 100vh;
        }

        .container {
            width: min(1000px, 90vw);
            min-height: 100vh;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 24px;
            margin-bottom: 30px;
            background: rgba(255, 255, 255, 0.58);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255,255,255,0.4);
            border-radius: 18px;
            padding: 18px 22px;
            box-shadow: 0 10px 30px rgba(30, 41, 59, 0.12);
        }

        .content-wrap {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            padding-bottom: 40px;
        }

        h1 {
            margin: 0;
            font-size: 2rem;
            color: #1f2937;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease, background 0.2s ease;
        }

        .btn:hover,
        .small-btn:hover,
        .welcome-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 18px rgba(79, 70, 229, 0.18);
            filter: brightness(1.06);
        }

        .btn-primary {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.8);
            color: #1f2937;
            border: 1px solid rgba(148, 163, 184, 0.5);
        }

        .btn-secondary:hover {
            background: rgba(248, 250, 252, 0.95);
            border-color: rgba(99, 102, 241, 0.5);
        }

        .alert {
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            background: rgba(220, 252, 231, 0.82);
            color: #166534;
            border: 1px solid rgba(187, 247, 208, 0.9);
            opacity: 0;
            transform: scale(0.8);
            animation: alertPopFade 2.8s ease-in-out forwards;
        }

        @keyframes alertPopFade {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            18% {
                opacity: 1;
                transform: scale(1.05);
            }
            28% {
                opacity: 1;
                transform: scale(1);
            }
            72% {
                opacity: 1;
                transform: scale(1);
            }
            100% {
                opacity: 0;
                transform: scale(0.96);
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(6px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.14);
            border-radius: 18px;
            overflow: hidden;
            animation: fadeIn 0.5s ease-in-out;
            border: 1px solid rgba(255,255,255,0.5);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        tbody tr {
            transition: background-color 0.25s ease, transform 0.25s ease;
        }

        tbody tr:hover {
            background-color: #fcfdffc9;
            transform: scale(1.01);
        }

        th, td {
            padding: 14px 12px;
            border: 1px solid rgba(148, 163, 184, 0.7);
            border-bottom: 1px solid rgba(148, 163, 184, 0.7);
            text-align: left;
            vertical-align: top;
            background: rgba(255, 255, 255, 0.18);
        }

        th {
            background: rgba(79, 70, 229, 0.12);
            color: #312e81;
            font-size: 0.8rem;
            text-transform: uppercase;
            border: 1px solid rgba(99, 102, 241, 0.45);
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: bold;
            opacity: 1;
            transform: none;
        }

        .status.pending {
            background: rgba(251, 191, 36, 0.18);
            color: #92400e;
        }

        .status.completed {
            background: rgba(34, 197, 94, 0.16);
            color: #166534;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
            min-height: 100%;
        }

        .small-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease, background 0.2s ease;
        }

        .small-btn.toggle {
            background: rgba(59, 130, 246, 0.12);
            color: #1d4ed8;
        }

        .small-btn.toggle:hover {
            background: rgba(59, 130, 246, 0.18);
            box-shadow: 0 8px 18px rgba(59, 130, 246, 0.18);
        }

        .small-btn.delete {
            background: rgba(239, 68, 68, 0.12);
            color: #b91c1c;
        }

        .small-btn.delete:hover {
            background: rgba(239, 68, 68, 0.18);
            box-shadow: 0 8px 18px rgba(239, 68, 68, 0.18);
        }

        .empty {
            text-align: center;
            background: rgba(255, 255, 255, 0.72);
            backdrop-filter: blur(6px);
            padding: 40px 20px;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.12);
            border: 1px solid rgba(255,255,255,0.4);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Sensal's Simple Task Manager</h1>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Add Task</a>
        </div>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <div class="content-wrap">
            @if ($tasks->isEmpty())
                <div class="empty">
                    <h2>No tasks yet</h2>
                    <p>Create your first task to get started.</p>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
                </div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Due Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ $task->description ?: 'No description' }}</td>
                                <td>
                                    <span class="status {{ strtolower($task->status) }}">{{ $task->status }}</span>
                                </td>
                                <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : 'No date' }}</td>
                                <td>
                                    <div class="actions">
                                        <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="small-btn toggle">
                                                {{ $task->status === 'Pending' ? 'Mark Completed' : 'Mark Pending' }}
                                            </button>
                                        </form>

                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary">Edit</a>

                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="small-btn delete">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
</html>
