<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .login-form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 280px;
            text-align: center;
            font-family: inherit;
            position: relative;
        }

        .login-form h2 {
            margin-bottom: 20px;
        }

        .login-form h3 {
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .login-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            text-align: left;
        }

        .login-form input {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            text-align: center;
        }

        .login-form input.error {
            border-color: red;
            background-color: #ffe6e6;
        }

        .login-form button {
            width: 90%;
            padding: 10px;
            background-color: #ff4c4c; /* warna merah */
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
        }

        .login-form button:hover {
            background-color: #d94444;
        }

        .error-message {
            color: red;
            margin-top: 10px; /* mengatur jarak pesan error ke bawah */
            font-size: 14px;
            font-weight: bold;
            background-color: #ffe6e6;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid red;
        }

        .login-form img {
            width: 40%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="login-form">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/KPU_Logo.svg/800px-KPU_Logo.svg.png" alt="Logo KPU Provinsi Kepri">

        <h2>Buku Tamu KPU Provinsi Kepulauan Riau</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="name">Username:</label>
            <input type="text" name="name" id="name" class="{{ $errors->any() ? 'error' : '' }}" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="{{ $errors->any() ? 'error' : '' }}" required>
            
            <button type="submit">Login</button>
        </form>

        @if($errors->any())
            <div class="error-message">
                <strong>Username atau Password Salah</strong>
            </div>
        @endif
    </div>

</body>
</html>
