
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyBlog') | MyBlog</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1e293b;
        }

        nav {
            background: #172554;
            color: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        nav .brand {
            font-size: 23px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 18px;
        }

        .container {
            width: 86%;
            max-width: 1100px;
            margin: 35px auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 8px;
            font-size: 30px;
        }

        h2, h3 {
            overflow-wrap: anywhere;
        }

        .muted {
            color: #64748b;
            line-height: 1.6;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 7px;
            color: white;
            background: #2563eb;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.88;
        }

        .btn-green {
            background: #15803d;
        }

        .btn-red {
            background: #dc2626;
        }

        .btn-gray {
            background: #64748b;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            margin-top: 18px;
        }

        form.inline {
            display: inline;
            margin: 0;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input, textarea {
            display: block;
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font: inherit;
            margin-bottom: 18px;
            background: white;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        input:focus, textarea:focus {
            outline: 2px solid #bfdbfe;
            border-color: #2563eb;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .success {
            color: #166534;
            background: #dcfce7;
        }

        .error {
            color: #991b1b;
            background: #fee2e2;
        }

        .tag {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .post-body {
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        footer {
            text-align: center;
            color: #64748b;
            padding: 25px 10px;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            .container {
                width: 92%;
                margin-top: 24px;
            }

            nav {
                padding: 16px 4%;
            }

            nav a {
                margin-left: 8px;
            }

            .card {
                padding: 18px;
            }

            h1 {
                font-size: 25px;
            }
        }
    </style>
</head>
<body>

    <nav>
        <a class="brand" href="{{ route('posts.index') }}">MyBlog</a>

        <div>
            <a href="{{ route('posts.index') }}">Home</a>
            <a href="{{ route('posts.create') }}">Create Post</a>
        </div>
    </nav>

    <main class="container">
        @if(session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert error">
                <strong>Please correct the following:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} MyBlog. Built By Andre Kyut using Laravel.
    </footer>

</body>
</html>
