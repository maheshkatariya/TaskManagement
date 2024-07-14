<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        window.csrfToken = "{{ csrf_token() }}";
    </script>

</head>
<body>
    <div id="loader">
        <img src="{{ asset('images/loading.gif') }}" alt="Loading...">
    </div>

    <div class="container mt-5">
        <h1 class="mb-4">Task Manager</h1>
        <div class="row">
            <div class="col-8">
                <div class="input-group mb-3">
                    <input type="text" id="task-title" class="form-control" placeholder="Enter task">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="addTask()">Add Task</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <button class="btn btn-secondary mb-3" onclick="showTasks('all')">Show All Tasks</button>
            </div>
        </div>
        <div class="row">
            <div id="messageDiv" class="alert alert-warning hide" role="alert">
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="task-list">
                
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/main.js') }}" defer></script>
</body>
</html>
