
<style>
    #layout-main {
        width:100%;
        height:100%;
        background-color:LightGrey;
        position:relative;
        overflow:hidden;
    }
    #layout-left {
        position:absolute;
        width:50%;
        height:100%;
        top:0;
        left:0;
        background-color:LightGrey;
    }
    #layout-right {
        position:absolute;
        width:50%;
        height:100%;
        top:0;
        left:50%;
        background-color:lightblue;
    }


    #logo
	{
	margin-top:50px;
	margin-left:50px;
	}
	#content_left
	{
	font-size:50px;
	
	width: 500px;
	margin-left: 50px;
	margin-top:calc(50% - 250px);
	}
	
	#content_right
	{
	font-size:50px;
	height:700px;
	width: 650px;
	margin-left: 50px;
	margin-top:calc(50% - 350px);
	}
	#popup
	{
	display:none;
	 position:fixed;
	 width:500px;
	 height:300px;
	 top: calc(50% - 150px);
	 left: calc(50% - 250px);
	 background-color:white;
	 border: 1px solid black;
         z-index:4;


	}
#popup2
	{
	display:none;
	 position:fixed;
	 width:500px;
	 height:300px;
	 top: calc(50% - 150px);
	 left: calc(50% - 250px);
	 background-color:white;
	 border: 1px solid black;
         z-index:4;


	}

	form
	{
	padding:20px;
	}

        #login_btn
        {
         position: absolute;
         width:90%;
         height:60px;
         left : calc(50% - 45%);
         }
         #signup_btn
        {
         position: absolute;
         width:90%;
         bottom: 10%;
         height:60px;
         left : calc(50% - 45%);
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

<div style='position:relative; height:100%'>




    <div id='layout-main'>
        <div id='layout-left'>
		
         <div id = 'content_left'>
         <p> <strong>Hear what people are questioning about 
         <br><br> join the conservation</strong></p>
		 </div>

             
                <button id = 'login_btn' type ='button'>Log In</button>
                <button id = 'signup_btn' type ='button'>Sign Up</button>
                
        </div>
        <div id='layout-right'>
		<img id = 'logo' src = 'One TRU Logo.png' alt ='tru-logo' width ='30%'>
		
		 <div id = 'content_right'>
         <p> <strong>See what's happening  in the world 
         <br><br><br> <br> Join the TRU Questions and Answers</strong></p>
		 </div>
        </div>
    </div>
	
	
	<div id='popup'>
	<h2 style='text-align:center;'>Login to TRU Messenger</h2>
	<form method = 'post' action = 'controller.php'>

         <input type='hidden' name='page' value='StartPage'>
         <input type='hidden' name='command' value='Login'>

	<label for='username'>Username:</label>
	<input type = 'text' name='username' required><br><br>
	<label for='password'>Password:</label>
	<input type = 'password' name='password' required><br><br>
        <?php if(!empty($msgInvalid)) echo $msgInvalid ?>
        <?php if(!empty($msgUserInserted)) echo $msgUserInserted?>
        <input type = 'submit' value = 'submit' style='position:absolute; bottom:10px; left:10px;'>
	<button id ='cancel_btn' type= 'button' style='position:absolute; bottom:10px; right:10px;'>cancel</button>
	</form>
     </div>


<div id='popup2'>
	<h2 style='text-align:center;'>Sign up to TRU Messenger</h2>
	<form method = 'post' action = 'controller.php'>

        <input type='hidden' name='page' value='StartPage'>
         <input type='hidden' name='command' value='Signup'>

	<label for='username'>Username:</label>
	<input type = 'text' name='username' required><br><br>
	<label for='password'>Password:</label>
	<input type = 'password' name='password' required><br><br>
        <label for='email'>Email:  </label>
	<input type = 'email' name='email' required>
        <?php if(!empty($msgUserExists)) echo $msgUserExists ?>
        <input type = 'submit' value = 'submit' style='position:absolute; bottom:10px; left:10px;'>


	<button id ='cancel_btn2' type= 'button' style='position:absolute; bottom:10px; right:10px;'>cancel</button>
	</form>
     </div>
<div id = 'blanket'></div>

</div>

<script>

    document.getElementById('login_btn').addEventListener('click',function(){
    document.getElementById('popup').style.display = 'block';
    document.getElementById('blanket').style.display = 'block';
});



document.getElementById('cancel_btn').addEventListener('click',function(){
    document.getElementById('popup').style.display = 'none';
    document.getElementById('blanket').style.display = 'none';

});


document.getElementById('signup_btn').addEventListener('click',function(){
    document.getElementById('popup2').style.display = 'block';
    document.getElementById('blanket').style.display = 'block';

});

document.getElementById('cancel_btn2').addEventListener('click',function(){
    document.getElementById('popup2').style.display = 'none';
    document.getElementById('blanket').style.display = 'none';

});

document.getElementById('blanket').addEventListener('click',function(){
    document.getElementById('popup').style.display = 'none';
    document.getElementById('popup2').style.display = 'none';
    document.getElementById('blanket').style.display = 'none';

});



function show_login(){
    document.getElementById('popup').style.display = 'block';
    document.getElementById('blanket').style.display = 'block';

}
function show_signup(){
    document.getElementById('popup2').style.display = 'block';
    document.getElementById('blanket').style.display = 'block';

}



<?php
if(!empty($display_modal_window)){
if($display_modal_window == 'no-modal-window');
else if ($display_modal_window == 'LogIn') echo 'show_login();';
else if ($display_modal_window == 'SignUp') echo 'show_signup();';

else;
}
?>


</script>
         


