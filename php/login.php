<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>

        body{
            background-color: whitesmoke;
        }
        .login_main{
            display: flex;
            margin-top: 7.5em;
            margin-left: 37em;
            text-decoration: none;
    }

.loginpage_logo{
    width: 175px;
    margin-top: 25px;
}

.loginpage_rightcomponent{
    height: 350px;
    width: 350px;
    border: 1px solid #DBDBDB;
    margin-top: 25px;
    text-align: center;
    background-color: white;
    border-radius: 2%;
}

.loginPage_signin{
    margin-top: 25px;
}

.loginpage_text{
    width: 250px;
    height: 36px;
    margin: 5px;
    border: 1px solid #DBDBDB;
    background-color: #FAFAFA;
    padding-left: 10px;
    border-radius: 5px;
}

.login_button{
    width: 270px;
    height: 36px;
    border-radius: 5px;
    font-weight: bold;
    margin-top: 10px;
    border: 1px solid #0395f6;
    background-color: #0395f6;
    color: white;
}

.login__ordiv {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

.login_divider1{
    width: 80px;
    height: 0px;
    margin-top: 23px;
    border: 1px solid #DBDBDB;
    margin-left: 3.6em;
}

.login_divider2{
    width: 80px;
    height: 0px;
    border: 1px solid #DBDBDB;
    margin-left: 13em;
    margin-top: -2.9em;
}

.login_or{
    font-weight: bold;
    color: #BEBEBE;
    margin-bottom: 2em;
    margin-top: -0.7em;
}

.login_fb{
    color: #395185;
    font-weight: bold;
    margin-top: 30px;
}

.login_forgot{
    color: rgba(var(--fe0, 0, 55, 107), 1);
    font-size: 14px;
    line-height: 14px;
    margin-top: 15px;
    text-align: center;
}

.loginpage_signupoption{
    margin-top: 25px;
    height: 59px;
    width: 350px;
    background-color: white;
    border: 1px solid #DBDBDB;
    text-align: center;
    text-decoration: none;
}

.loginpage_sigin p{
    margin-top: 1em;
    font-size: 0.5em;
    text-decoration: none;
    color: #0395f6;
}

.loginpage_sigin a{
    text-decoration: none;
    color: #0395f6;
}

.loginpage_sigin span{
    color: #0395f6;
    text-decoration: none;
}

.loginpage_sigin{
    font-size: 1em;
}

.loginpage_signup{
    margin-top: 30px;
}

.loginpage_downloadsection{
    height: 105px;
    width: 350px;
    text-align: center;
    margin-top: 20px;
}

.loginpage_option{
    margin-top: 20px;
}

.loginpage_dwimg{
    margin: 5px;
}

@media screen and (max-width: 600px) {
    .login_main{
            margin-top: 5.5em;
            margin-left: 1em;
    }
}
    </style>
</head>
<body>
    <?php 
        include("connection.php");
    ?>
    <?php 
if (isset($_POST['username'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $stmt = mysqli_prepare($connection, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['status'] = $data['login'];
        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['login'] = true;
        header('location: index3.php');
        exit();
    } else {
        $error = "Invalid username or password";
    }
}

    ?>
    <div>
        <form method="POST">
        <div>
                        <div class="login_main">
                            <div>
                                </div>
                        <div>
                        <div class="loginpage_rightcomponent">
                        <h3 class="mt-4">Login</h3>
                            <div class="loginPage_signin">
                                <table>
                <tr>
                    <td><input type="text" name="username" placeholder="username" class="ms-5 pt-2 pb-2 ps-3" style="width: 100%;"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" required class="ms-5 pt-2 pb-2 ps-3 mt-3" style="width: 100%;" placeholder="password"></td>

                </tr>
                <tr>
                    <td colspan="3"><input type="submit" value="login" style="width:100%" class="ms-5 mt-3"></input></td>
                </tr>
            </table>
                            </div>
                            <div class="login_ordiv">
                                <div class="login_divider1"></div>
                                <div class="login_or">Or</div>
                                <div class="login_divider2"></div>
                            </div>
                            <div class="login_fb">
                                <img src="" width="15px">Log in with something else</div>
                            </div>

                        <div class="loginpage_signupoption">
                            <div class="loginpage_signin">
                                <p class="mt-3">Don't have an account? <a href="register.php">Sign up</a></p>
                            </div>
                        </div>
                        </div>
                        </div>
            </div>
        </form>
    </div>
</body>
</html>