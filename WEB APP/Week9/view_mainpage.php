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

     #popup
	{
	display:none;
	 position:fixed;
	 width:500px;
	 height:150px;
	 top: calc(50% - 150px);
	 left: calc(50% - 250px);
	 background-color:white;
	 border: 1px solid black;
         z-index:4;


	}
      #blanket
         {
          display:none;
          position:absolute;
          top:0;
          left:0;
          height:100%;
          width:100%;
          background-color:grey;
          opacity:0.8;
          z-index:3;
         }







</style>
<head>
    <title>Mainpage</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
<!----<p>Welcome <?php echo $_SESSION['username'] ?></p>----->
    <h3>Friends</h3>
    <div id = 'result'>

<?php
echo "<script>";

if (isset($searched)) {
    $str = "<table>";
    //$str .= "<tr>";
    //foreach ($searched[0] as $n => $v) {
       // $str .= '<th>' . $n . '</th>';
    //}
    //$str .= "</tr>";

    for ($i = 0; $i < count($searched); $i++) {
        $str .= "<tr>";
        foreach ($searched[$i] as $n => $v) {
            $str .= '<td>' . $v . '</td>';
        }
        $str .= "</tr>";
    }

    $str .= "</table>";
    
    
    echo "$('#result').html('$str');
";
}
echo "</script>";
?>
    </div>
    
    <h3>Messages</h3>
    <h3>Unread Messages</h3>
    <h3>Read Messages</h3>
</div>

<div id ='right'>
</div>


<div id='popup'>
	<h2 style='text-align:center;'>Search Friends</h2>
	<form method = 'post' action = 'controller.php'>

         <input type='hidden' name='page' value='MainPage'>
         <input type='hidden' name='command' value='SearchFriends'>

	<label for='search'>Search:</label>
	<input type = 'text' name='search' required><br><br>
	 <input type = 'submit' value = 'submit' style='position:absolute; bottom:10px; left:10px;'>
	<button id ='cancel_btn' type= 'button' style='position:absolute; bottom:10px; right:10px;'>cancel</button>
	</form>
     </div>

<div id='blanket'></div>

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
    
    let timer = setTimeout(logout, 10*60*10000);
    function mousemove_keydown() {
        clearTimeout(timer);
        timer = setTimeout(logout, 10*60*10000);
    }
    
    window.addEventListener('mousemove', mousemove_keydown);
    window.addEventListener('keydown', mousemove_keydown);
</script>

<!----jquery----->
<script>
$('#search').click(function(){
   $('#popup,#blanket').show();
});

$('#cancel_btn').click(function(){
   $('#popup,#blanket').hide();

});
</script>
</html>
