<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1>Home</h1>
    <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>
        <h1 align="center"> Presistant XSS Attach</h1>
    <table align="center">
        <tr><td>
            <form action="presistant.php" method="post">
                <textarea row="6" cols="55" name ="comment" placeholder="Leave your comment" maxlength="400"></textarea>
                <table align="center">
                    <tr><td>
                        <input type="submit" name="Comment"/>
                    </td></tr>
                </table>
            </form>
        </td></tr>
    </table>
<br>
<br>
<table align="center">
<tr><td>
    <form action="presistant.php" method="post">
    Clear Table: <input type="submit" name="clear" value="Clear Table"/>
    </form>

</td></tr>

</table>
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>
    
</body>
</html>
