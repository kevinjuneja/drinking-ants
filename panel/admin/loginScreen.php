<?php
    session_start();

    include_once '../../cus/admin_functions.php';
    include '../../cus/variables.php';

    $functions = new AdminFunctions();

    $registered = TRUE;
    $validated = TRUE;

    if (!isset($_SESSION['logged_in'])) {
        $_SESSION['logged_in'] = FALSE;
    }

    if ((isset($_POST["username"])) && (isset($_POST["password"]))) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        if (!($functions->isValidUser($username, $password))) {
            $registered = FALSE;

            echo "not a valid user";
        }

        if ($registered == FALSE) {
          //  header(sprintf("Location: %s", $index));
          //  exit;
        }

        if ($registered == TRUE) {
            $results = $functions->login($username);

            if(!$results) {
             //   header(sprintf("Location: %s", $index));
              //  exit;
                echo "error loggin in";
            }

            $row = mysqli_fetch_row($results);
            $hashedPw = $row[0];
            $validated = $functions->validate($password, $hashedPw);

            if ($validated == FALSE) {
               // header(sprintf("Location: %s", $index));
                echo "validated was false after password validation";
              //  exit;
            }
            if ($validated == TRUE) {
                
                $_SESSION["logged_in"] = TRUE;

                //redirct to admin panel.
                header(sprintf("Location: %s", $admin));
                echo "Successful login";
              //  exit;
            }
        }

    }
    if(!$_SESSION['logged_in']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Anthill Pub Administration Panel</title>
        <link rel="stylesheet" type="text/css" href="css/jquery.validate.css" />
        <link rel="stylesheet" type="text/css" href="css/login.style.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        <script src="js/jquery.validation.functions.js" type="text/javascript"></script>
        <script src="js/helper.js" type="text/javascript"></script>
    </head>
    <body>
    	<form id="login" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
	    	<h1>Admin Log In</h1>
	    	<fieldset id="inputs">
		    	<input id="username" name="username" type="text" placeholder="Username" autofocus required>   
		    	<input id="password" name="password" type="password" placeholder="Password" required>
		    </fieldset>
		    <fieldset id="actions">
			    <input type="submit" id="submit" value="Log in">
			</fieldset>
		</form>
    </body>
</html>
