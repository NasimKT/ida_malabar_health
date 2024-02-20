<!DOCTYPE html>
<html>

<head>
    <link href="style.css" rel="stylesheet">
    <script>
    function validate() {
        var user = document.getElementById("usr");
        var pass = document.getElementById("pass");

        if (user.value.length === 0) {
            user.style.border = "1px solid red";
            return false;
        } else if (pass.value.length === 0) {
            pass.style.border = "1px solid red";
            return false;
        }

        if (user.value.length !== 0 && pass.value.length !== 0) {
            user.style.border = "none";
            pass.style.border = "none";
        }
    }


    </script>

</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" action="login.php" method="post">
                    <center>
                        <h2>Administrator Login</h2>
                    </center>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="Username" id="usr" name="user" oninput="validate()">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" id="pass" name="pass"
                            oninput="validate()">
                    </div>
                    <button type="submit" class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>

</html>