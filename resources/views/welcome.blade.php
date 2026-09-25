<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task Manager</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <main class="welcome-page">
            <div class="welcome-card">
                <h1>Personal Task Manager</h1>
                <p>Your tasks are ready to manage.</p>
                <a href="{{ route('tasks.index') }}" class="welcome-button">Open Tasks</a>
            </div>
        </main>
    </body>
</html>
