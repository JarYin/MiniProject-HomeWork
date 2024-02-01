<?php include('config.php');
include('ui/navbar.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Disney Movie Hub</title>
</head>
<style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1;
        }

        .footer {
            background-color: #f8f8f8;
           
            text-align: center;
        }
    </style>

<body class="bg-gray-100 font-sans">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md">
            <h1 class="text-2xl font-bold mb-4 text-center">Login to Disney Movie Hub</h1>

            <form id="loginForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Email">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Password">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">Login</button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="register.php">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <div class="footer">
        <?php include('ui/footer.php') ?>
    </div>
</body>

</html>