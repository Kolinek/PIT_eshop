<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Kolínek david.kolinek2@gmail.com">
    <link rel="icon" type="Favicon/png" href="">
    <link rel="stylesheet" href="styles/main.css">
    <title>Checkuj</title>
</head>
<body>
<nav>
  <a href="index.php"><img src="images/logo.png" alt="xxx"></a>
    <div class="nav-odkazy">
        <ul>
             <li><a href="login.php">Košík</a></li>
            <li><a href="login.php">Prihlásenie</a></li>
        </ul>
    </div>
 </nav>


<h1>Prihlasenie</h1>

<form action="include/formhandler.inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="password" placeholder="Password">
    <button>Signup</button>
</form>



</body>
</html>
