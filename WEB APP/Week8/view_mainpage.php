<?php

//session_start();  // Session is started in controller.php before mainpage.php is included.

if (empty($_SESSION['signedin'])) {
    $display_modal_window = 'no-modal-window';
    include('view_startpage.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<style>
     #left{
     position:absolute;
     top:0;
     left:0;
     height:100%;
     width:20%;
     border-right: 1px solid lightGrey;
     }

     #middle{
     position:absolute;
     top:0;
     left:20%;
     height:100%;
     width:60%;
     border-right: 1px solid lightGrey;
     padding:50px;

     }

     #right{
     position:absolute;
     top:0;
     left:20%;
     height:100%;
     }

     #logo{
     position:absolute;
     width :200px;
     left: calc(25% - 10%);
     top:5%;
     }

     #search{
     position:absolute;
     width :50px;
     left: calc(90% - 10%);
     top:30%;

     }
     #send{
     position:absolute;
     width:50px;
     left: calc(90% - 10%);
     top:40%;

     }


     #messages{
     position:absolute;
     width:50px;
     left: calc(90% - 10%);
     top:50%;

     }

     #profile{
     position:absolute;
     width:50px;
     left: calc(90% - 10%);
     top:60%;
     cursor:pointer;

     }





</style>
<head>
    <title>Mainpage</title>
</head>
<body style='overflow:hidden;'>

<div id ='left'>
    <img src='TRU_Logo.png' alt='trulogo' id = 'logo'>
<br><br>
    <img src='search.png' alt='search' id = 'search'>
<br>
    <img src='send.png' alt='send' id = 'send'>
<br>
    <img src='menu_icon.png' alt='message' id = 'messages'>
<br>

<form id ='formsubmit' method='post' action = 'controller.php'>
    <input type='hidden' name='page' value='MainPage'>
    <input type='hidden' name='command' value='LogOut'>
</form>

    <img src='user.png' alt='profile' id = 'profile'>


</div>

<div id = 'middle'>
    <h3>Friends</h3>
    <h3>Messages</h3>
    <h3>Unread Messages</h3>
    <h3>Read Messages</h3>
</div>

<div id ='right'>
</div>

</body>
<!------
<script>
    document.getElementById('profile').addEventListener('click',function(){
    document.getElementById('formsubmit').submit();


});
</script>
------->
<script>


    function logout() {
        document.getElementById('formsubmit').submit();
    }
    
    document.getElementById('profile').addEventListener('click', logout);
    
    window.addEventListener('unload', logout);
    
    let timer = setTimeout(logout, 10000);
    function mousemove_keydown() {
        clearTimeout(timer);
        timer = setTimeout(logout, 10000);
    }
    
    window.addEventListener('mousemove', mousemove_keydown);
    window.addEventListener('keydown', mousemove_keydown);
</script>
</html>
