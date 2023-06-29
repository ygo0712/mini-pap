<?php
// Verifica se foram enviados dados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Conecta com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mini";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }
    
    // Captura os valores do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Valida o nome de usuário e senha
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        body {
            background: url(fundo-login.jpg);
            font-family: Montserrat, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #fff;
            margin: 250px auto;
            max-width: 500px;
            padding: 20px;
            border-radius: 35px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            margin: 0;
            padding: 0;
            font-size: 36px;
            margin-bottom: 20px;
        }
        form {
            margin: 20px;
        }
        label, input[type="submit"] {
            display: block;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            font-family: Montserrat, sans-serif;
            font-size: 16px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
            background-color: #f2f2f2;
            color: #333;
        }
        input[type="password"] {
            position: relative;
        }
        .show-pass {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: Montserrat, sans-serif;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label for="username">Email</label>
            <input type="text" id="username" name="username" required><br>
            <br>
            <label for="password">Senha</label>
            <div style="position: relative;">
            <input type="password" id="password" name="password" required>
                <span class="show-pass">
                    <input type="checkbox" onclick="ShowPass()">
                    <span style="position: relative; top: -2px">Mostrar senha</span>
                </span>
                
            </div>
            <div style="position: relative;"><br>

            <input type="submit" value="Entrar"><br>
        </form>
        <p>Não tem uma conta? <a href="registo.php">Registrar</a></p>
    </div>
    <script>
        function ShowPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>