<!DOCTYPE html>
<html>
    <head>
        <title>USER AUTHENTICATION & Questions</title>
        <style>
            #heading{
                background-color: honeydew;
                text-align: center;
            }

        </style>
    </head>

    <body>
     <h1 id="heading">User Authenication and List all Questions</h1>
     <h2>User Authenication</h2>
     <form action = "controller.php" method="post">
        <input type="hidden" name="page" value="StartPage">
        <input type ="hidden" name="command" value="Login">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <?php if(!empty($msgValid)) echo $msgValid ?>
        <?php if(!empty($msgInvalid)) echo $msgInvalid ?>
        <br><br>
        <input type="submit" name="submit" value="submit"> 

     </form>
     <hr>
     <h1>List All Questions</h1>
     <form action="controller.php" method="post">
        <input type="hidden" name="page" value="MainPage">
        <input type ="hidden" name="command" value="ListQuestions">
        <input type="submit" name="submit" value="submit">

     </form>
    </body>
    <script>

    </script>
</html>