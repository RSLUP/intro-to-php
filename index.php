<?php require "auth_login.php"; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css" />
  <link rel="stylesheet" type="text/css" href="css/index.css" />
</head>

<body>
  <div id="login-div">
    <form id="login-form" action="process_login.php" method="POST">
      <input name="email" type="text" placeholder="email" />
      <input name="password" type="password" placeholder="password" />
      <button type="submit">Login</button>
    </form>
  </div>
</body>

</html>