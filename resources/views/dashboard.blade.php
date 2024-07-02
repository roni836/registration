<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @keyframes wave {
            0%,
            100% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(20deg);
            }
        }

        .hand {
            display: inline-block;
            transform-origin: bottom center;
            animation: wave 2s infinite;
        }

        .table-container {
            margin-top: 50px;
        }

        .navbar {
            margin-bottom: 30px;
        }

        .status-badge {
            padding: 0.5em 0.75em;
            font-size: 0.875em;
        }

        .btn-done {
            background-color: #28a745;
            color: white;
        }

        .btn-pending {
            background-color: #ffc107;
            color: white;
        }

        .form-container {
            margin-top: 20px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border p-3">
        <div class="container-fluid">
            <span class="navbar-brand fw-bold">Hi, {{ $name }} </span>
            <span class="hand">👋</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="ms-auto" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <h3 class="text-center">Add New Task</h3>
        <form id="add-task-form" class="form-container">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="new-task" placeholder="Enter new task" required>
                <button type="submit" class="btn btn-primary">Add Task</button>
            </div>
        </form>
        <div class="table-container border border-dark d-flex text-center ">
            <table class="table table-hover">
                <thead >
                    <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="text-capitalize">{{ $task->task }}</td>
                            <td>
                                @if ($task->status === 'done')
                                    <span class="badge bg-success status-badge">Done</span>
                                @else
                                    <span class="badge bg-warning text-dark status-badge">Pending</span>
                                @endif
                            </td>
                            <td>
                                @if ($task->status === 'done')
                                    <button class="btn btn-sm btn-warning" onclick="changeStatus({{ $task->id }}, 'pending')">Mark as Pending</button>
                                @else
                                    <button class="btn btn-sm btn-success" onclick="changeStatus({{ $task->id }}, 'done')">Mark as Done</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'api_key': 'helloatg'
            }
        });

        function changeStatus(task_id, status) {
            $.ajax({
                url: '/api/todo/status',
                type: 'POST',
                data: {
                    task_id: task_id,
                    status: status
                },
                success: function (response) {
                    if (response.status === 1) {
                        location.reload();
                    } else {
                        alert('Failed to update task status');
                    }
                }
            });
        }

        $('#add-task-form').on('submit', function (e) {
            e.preventDefault();
            var task = $('#new-task').val();

            $.ajax({
                url: '/api/todo/add',
                type: 'POST',
                data: {
                    task: task,
                    user_id: {{ auth()->user()->id }}
                },
                success: function (response) {
                    if (response.status === 1) {
                        location.reload();
                    } else {
                        alert('Failed to add task');
                    }
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/js/bootstrap.min.js"></script>
</body>

</html>
