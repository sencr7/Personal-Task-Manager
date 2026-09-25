<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            color: #1f2937;
            background-image: url('/images/cristiano-ronaldo-ronaldo-hd-wallpaper-preview.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            max-width: 600px;
            width: min(90vw, 600px);
            margin: 60px auto;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(8px);
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.15);
            border: 1px solid rgba(255,255,255,0.35);
            animation: fadeIn 0.5s ease-in-out;
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

        h1 {
            margin-top: 0;
        }

        .field {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, textarea, select, button {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        textarea {
            min-height: 100px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn {
            text-decoration: none;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease, background 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 18px rgba(79, 70, 229, 0.18);
            filter: brightness(1.06);
        }

        .btn-primary {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            color: white;
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.25);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.7);
            color: #111827;
            display: inline-block;
            text-align: center;
            border: 1px solid rgba(148, 163, 184, 0.5);
        }

        .btn-secondary:hover {
            background: rgba(248, 250, 252, 0.95);
            border-color: rgba(99, 102, 241, 0.5);
        }

        .error {
            color: #b91c1c;
            font-size: 0.85rem;
            display: block;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Create Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="field">
                <label for="task_name">Task Name</label>
                <input id="task_name" type="text" name="task_name" value="{{ old('task_name') }}" required>
                @error('task_name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="field">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="Pending" {{ old('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ old('status') === 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="field">
                <label for="due_date">Due Date</label>
                <input id="due_date" type="date" name="due_date" value="{{ old('due_date') }}">
                @error('due_date')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
