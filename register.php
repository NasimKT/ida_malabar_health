<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="wrapper">
        <div class="title" id="title">
            Login
        </div>
        <form action="log.php" method="post" class="login" id="login">
            <div class="field">
                <input type="text" name="email" required>
                <label>Email Address</label>
            </div>
            <div class="field">
                <input type="password" name="pass" required>
                <label>Password</label>
            </div>
            <div class="field">
                <input type="submit" value="Login">
            </div>
            <div class="signup-link">
                Not a member? <span style="color:red; cursor:pointer;" onclick="sign()">Signup now</span>
            </div>
        </form>
        <form action="sign.php"  method="post" class="sign" id="sign">
            <div class="field">
                <input type="text" name="sig_email" id="sig_email">
                <label>Email Address</label>
            </div>
            <div class="field">
                <input type="password" id="pas" name="sig_pass" oninput="verification()">
                <label>Password</label>
            </div>
            <div class="field">
                <input type="password" id="con_pas" oninput="verification()">
                <label>Confirm Password</label>
            </div>
            <div id="pas-match">Passwords should match!!</div>
            <div class="field">
                <input type="submit" value="Register" onclick="return validation()">
            </div>
            <div class="signup-link">
                Already have an account? <a style="color:red; cursor:pointer;" onclick="login()">Login now</a>
            </div>
        </form>
    </div>
    <script>
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/

        function sign() {
            document.getElementById("sign").style.display = "block";
            document.getElementById("login").style.display = "none";

            document.getElementById('title').innerHTML = 'Register';
            document.title = 'Registration';
        }
        function login() {
            document.getElementById("login").style.display = "block";
            document.getElementById("sign").style.display = "none";

            document.getElementById('title').innerHTML = 'Login';
            document.title = 'Login';
        }
        function verification() {
            var pasInput = document.getElementById('pas');
            var conPasInput = document.getElementById('con_pas');
            if (pasInput.value !== conPasInput.value) {
                pasInput.style.border = "1px solid red";
                conPasInput.style.border = "1px solid red";
                document.getElementById('pas-match').innerHTML = 'Passwords should match!!';
                document.getElementById("pas-match").style.display = "block";
            } else {
                pasInput.style.border = "none";
                conPasInput.style.border = "none";
                document.getElementById("pas-match").style.display = "none";
            }
        }
        function validation(){
            let email = document.getElementById('sig_email').value;
            let pass = document.getElementById('pas').value;
            if (!emailRegex.test(email)) {
                alert('Email is not valid');
                return false;
            }
            if (pass.length !== 8) {
                document.getElementById('pas-match').innerHTML = 'Password must be at least 8 characters long!!';
                document.getElementById('pas-match').style.display = 'block';
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
