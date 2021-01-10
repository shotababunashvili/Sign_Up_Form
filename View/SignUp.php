<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../style/style.css">
    <script type="text/javascript" src="../Scripts/app.js"></script>
</head>

    <div class="main">
        <form action="" method="post" class="backg" id="user_form">

            <h1>Sign Up</h1>
            <hr>

            <div class="col" id="#mainDiv">
                <input type="text" placeholder="First Name" name="fname" id="fname_id"><br>
                <div class="messages" id="fname_messages"></div>
                <input type="text" placeholder="Last Name" name="lname" id="lname_id"><br>
                <div class="messages" id="lname_messages"></div>
                <input type="email" placeholder="Email" name="email" id="email_id"><br>
                <div class="messages" id="email_messages"></div>
            </div>
            <hr>

            <button type="submit" class="btn">Sign Up</button>
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
        </form>
    </div>

</body>
</html>