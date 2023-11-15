<?php require_once 'core/boot.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
        <title>Register</title>
    </head>

    <body>
        <main>
        <i style="color: red; text-align: center;">
                        <?php if (isset($_SESSION['flash_message']))
                            echo $_SESSION['flash_message'];
                        unset($_SESSION['flash_message']); ?>
                    </i>
            <form action="register.php" method="post">

                <h1>Sign Up</h1>
                <div>
                   
                </div>
                <div>

                    <label for="username">Username:</label>
                    <input type="text" name="name" id="username" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div>
                    <label for="password">Phone:</label>
                    <input type="text" name="phone" id="password" required>
                </div>
                <div>
                    <label for="password">Address:</label>
                    <input type="text" name="address" id="password" required>
                </div>

                <div>
                </div>
                <button type="submit">Register</button>
                <footer>Already a member? <a href="login.php">Login here</a></footer>
            </form>
        </main>
    </body>

    </html>