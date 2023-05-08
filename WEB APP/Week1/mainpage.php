

<!DOCTYPE html>
<html>

<?php
if(empty($_SESSION['signedin'])){

$display_modal_window = 'no-modal-window';
         include('startpage.php');
         exit();



};

echo '<h1>'.'welcome '.$_SESSION['username'].'</h1>';
?>

<style>

#deleteAccountDiv, #resetPasswordDiv{
display:none;
position:absolute;
width:400px;
height:200px;
top:calc(50% - 100px);
left:calc(50% - 200px);
border : 1px solid black;
background-color: white;
}


#chatBoxDiv{
display:none;
position:absolute;
width:700px;
height:500px;
top:calc(50% - 250px);
left:calc(50% - 350px);
border : 1px solid black;
background-color: white;
}
#chatsDiv{

position:absolute;
width:700px;
height:300px;
top:calc(50% - 200px);
left:calc(50% - 350px);
border : 1px solid black;
background-color: white;
}

#chat{
position:absolute;
bottom:8%;
}

#chat1{
position:absolute;
bottom:1%;
}

#refresh_btn{
display:none;
}

#refresh_btn2{
display:none;
}
#refresh_btn3{
display:none;
}


#crudDiv{
display:none;
position:absolute;
width:80%;
height:80%;
top:calc(50% - 40%);
left:calc(50% - 40%);
border : 1px solid black;
background-color: white;
}

#crudResult{

position:absolute;
width:70%;
height:50%;
top:calc(50% - 35%);
left:calc(50% - 25%);
border : 1px solid black;
background-color: white;
}
#del_form{
display:none;
}
#edit_form{
display:none;
}


#notes{
display:none;
position:absolute;
width:700px;
height:500px;
top:calc(50% - 250px);
left:calc(50% - 350px);
border : 1px solid black;
background-color: white;
}

#notesResult{

position:absolute;
width:50%;
height:50%;
top:calc(50% - 25%);
left:calc(50% - 25%);
border : 1px solid black;
background-color: white;
}

#rankingDiv{
display:none;
position:absolute;
width:50%;
height:50%;
top:calc(50% - 25%);
left:calc(50% - 25%);
border : 1px solid black;
background-color: white;
}
#cancelBtnRank{
position:absolute;
bottom:1%;

}

#rankingResult{

position:absolute;
width:50%;
height:50%;
top:calc(50% - 25%);
left:calc(50% - 25%);
border : 1px solid black;
background-color: white;
}

#sDiv{
display:none;
position:absolute;
width:50%;
height:50%;
top:calc(50% - 25%);
left:calc(50% - 25%);
border : 1px solid black;
background-color: white;
}

#sResult{

position:absolute;
width:30%;
height:30%;
top:calc(50% - 15%);
left:calc(50% - 15%);
border : 1px solid black;
background-color: white;
}


#pDiv{
display:none;
position:absolute;
width:50%;
height:50%;
top:calc(50% - 25%);
left:calc(50% - 25%);
border : 1px solid black;
background-color: white;
}

#pResult{

position:absolute;
width:50%;
height:50%;
top:calc(50% - 25%);
left:calc(50% - 25%);
border : 1px solid black;
background-color: white;
}
#info{

position:absolute;
width:50%;
height:50%;
top:calc(50% - 25%);
left:calc(50% - 25%);
border : 1px solid black;
background-color: white;
}


</style>

<head>

<title>
Mainpage
</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>


<body>
<div id='info'>
<h2>IMPORTANT!!!! FOR NEW USERS</h2>
<p><strong>for new users,'see your progress' and 'create daily notes section' will not work until
 some habits and notes are added.<br><br>Ignore all warnings 
messages and errors, first add some habits and notes using 'edit your habits and create daily notes'
section. <br><br>please ignore all warnings and errors,these will go ways, once some data is inserted into our database, THANKYOU.</strong></p>
<p>this message will disappear in 20 seconds</p>
</div>
<!----8 User level features----->
<ul>
<li id='p_btn'>See your Progress</li><br><br>

<li id='edit'>Edit your Habits</li><br><br>

<li id='dailyNotes'>Create your Daily notes</li><br><br>

<li id = 'chatting'>Chat with other users</li><br><br>

<li id='rank_btn'>See your worldwide ranking</li><br><br>

<li id='sNav'>Search for other users habits</li><br><br>

<li id = 'reset'>Reset Password</li><br><br>

<li id = 'deleteUser'>Delete My Account</li><br><br>

<li id = 'logout' >LogOut</li>

</ul>
<!----8 User level features----->


<!----logout feature----->
<form method = 'post' action = 'controller.php' id = 'logout_form'>

<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='logout'>

</form>
<!----logout feature----->


<!----delete my account feature----->
<div id = 'deleteAccountDiv'>
<h2>Delete My Account</h2>
<p>Are you Sure ?</p>
<form id = 'deleteAccount' method = 'post' action = 'controller.php'>

<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='deleteAccount'>
<input type = 'submit' value = 'Yes'>
<input type = 'button' value = 'No' class='cancelBtn'>


</form>
</div>
<!----delete my account feature----->

<!----reset password feature----->
<div id ='resetPasswordDiv'>
<h2>Change Profile Password</h2>
<form id = 'resetPassword' method = 'post' action = 'controller.php'>
<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='resetPassword'>
<input type='password' name='oldPassword' placeholder='Enter Old password' required><br><br>
<input type='password' name='newPassword' placeholder='Enter New password' required><br><br>
<?php if(!empty($msg_reset)) echo $msg_reset ?>
<br><br>
<input type = 'submit' value = 'Reset'>
<input type = 'button' value = 'cancel' class='cancelBtn'>

</form>

</div>
<!----reset password feature----->

<!----chat with other users feature----->
<div id = 'chatBoxDiv'>
<h2>Habits Users Chat Box</h2>

<div id='chatsDiv' style='overflow:auto;'>
</div>



<form id = 'chat' method = 'post' action = 'controller.php'>
<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='chat'>
<input type='text' name='chat' id='msgInput' placeholder='type something to post!!!' required><br><br>
<input type = 'button' value = 'Post' id = 'post'>
<input type = 'button' value = 'cancel' class='cancelBtn'>


</form>

<form id = 'chat1' method = 'post' action = 'controller.php'>
<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='displayChats'>

<input type='submit' id='refresh_btn' value='refresh'>
</form>

</div>
<!----chat with other users feature----->

<!----create your daily notes----->
<div id='notes'>
<form id='notes_form' action='controller.php' method='post'>
<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='postNotes'>
<input type ='text' name='notes' placeholder='add todays notes'>
<input type='button' name='submit' value='Add Notes' id='addNotes'>
<input type='button' name='cancel' value='cancel' class='cancelBtn'>
</form>
<div id='notesResult' style='overflow:auto;'>

</div>
<form id='displayNotes_form' action='controller.php' method='post'>
<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='showNotes'>
<input type='submit' id='refresh_btn3' value='refresh'>
</form>

</div>
<!----create your daily notes----->

<!----edit habits CRUD----->
<div id ='crudDiv'>
<h2 style='text-align:center;'>Add or Change Habits</h2>
<div id='crudResult' style='overflow:auto;' ></div>


<form id='crud_form' action='controller.php' method='post'>
<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='Habits'>
<input type='text' name='habitName' placeholder='Habit Name' id='msg2Input' required><br>

<select  name="type" id='msgSelect'>
    <option value="good">Good Habit</option>
    <option value="bad">Bad habit</option>
</select><br>

<input type='submit' id='add_btn' value='Add/Edit Habit'>
<input type = 'button' value = 'cancel' class='cancelBtn'>

</form>
<form id='del_form' action='controller.php' method='post'>
<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='deleteHabits'>
<input type ='text' name='id' placeholder='id' id='msg3Input'>
<input type='button' value='submit' id='delete' >
</form>


<form id='edit_form' action='controller.php' method='post'>
<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='editHabits'>
<input type ='text' name='id' placeholder='id' id='msg4Input'>
<input type='button' value='submit' id='edit' >
</form>


<form id = 'habitsDisplay' method = 'post' action = 'controller.php'>
<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='displayHabits'>

<input type='submit' id='refresh_btn2' value='refresh'>
</form>

</div>

<!----edit habits CRUD----->
<!----ranking----->
<div id='rankingDiv'>
<h2>the higher the rank, the better</h2>
<form id='rank_form' action='controller.php' method='post'>
<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='displayRanking'>
<input type = 'button' value = 'cancel' class='cancelBtn' id='cancelBtnRank'>

</form>
<div id='rankingResult' style='overflow:auto;'>
</div>
</div>
<!----ranking----->




<!----Search----->
<div id='sDiv'>


<form id='s_form' action='controller.php' method='post'>
<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='searchUser'>
<input type ='text' name='user' placeholder='search user' required>
<input type='button' value='search' id='sBtn'>
<input type = 'button' value = 'cancel' id='sCancel' >

</form>




<div id='sResult' style='overflow:auto;'>
</div>




</div>
<!----Search----->


<!----progress----->
<div id='pDiv'>
<form id='p_form' action='controller.php' method='post'>
<input type = 'hidden' name='page' value='mainpage'>
<input type = 'hidden' name='command' value='prog'>
<input type = 'button' value = 'cancel' class='cancelBtn'  id='pCancel'>

</form>
<div id='pResult'  style='overflow:auto;'>
</div>
</div>
<!----progress----->
</body>



<script>

function logout(){

   $('#logout_form').submit();

};

$('#logout').click(logout);

$('#deleteUser').click(
function(){

  $('#deleteAccountDiv').show();
}
);

$('#reset').click(
function(){

  $('#resetPasswordDiv').show();
}
);

$('#edit').click(
function(){

  $('#crudDiv').show();
}
);



$('.cancelBtn').click(
function(){

  $('#deleteAccountDiv, #resetPasswordDiv, #chatBoxDiv,#crudDiv,#notes,#rankingDiv,#pDiv').hide();
}

);


$('#chatting').click(
  function(){

    $('#chatBoxDiv').show();
}

);


$('#sNav').click(
  function(){

    $('#sDiv').show();
}

);

$('#sCancel').click(
  function(){

    $('#sDiv').hide();
}

);



$('#dailyNotes').click(
  function(){

    $('#notes').show();
}

);


$('#rank_btn').click(
  function(){

    $('#rankingDiv').show();
}

);


$('#p_btn').click(
  function(){

    $('#pDiv').show();
}

);


function show_resetDiv(){

   $('#resetPasswordDiv').show(); 

};

function show_chatBox(){

   $('#chatBoxDiv').show(); 

};





$(document).ready(function(){
  $('#post').click(function(e){

      e.preventDefault();
       
        $.ajax({

                 method: "post",
                 url:"controller.php",
                 data : $('#chat').serialize(),
                 dataType: "html",
                 success: function(data){
                      //let content = JSON.parse(data);
                      //let content = JSON.stringify(data);
                      //console.log(data);
                      $('#chatsDiv').html(data);
                      $("#msg2Input").val("");
                      //$('#chatsDiv').html(content);

}



});


})


});

//refresh
$(document).ready(function(){
  $('#refresh_btn').click(function(e){

      e.preventDefault();
       
        $.ajax({

                 method: "post",
                 url:"controller.php",
                 data : $('#chat1').serialize(),
                 dataType: "html",
                 success: function(data){
                      $('#chatsDiv').html(data);

}



});


})


});

setInterval(function() {
  $('#refresh_btn').click();
}, 1000);

//refresh


//refresh3
$(document).ready(function(){
  $('#refresh_btn3').click(function(e){

      e.preventDefault();
       
        $.ajax({

                 method: "post",
                 url:"controller.php",
                 data : $('#displayNotes_form').serialize(),
                 dataType: "html",
                 success: function(data){
                      $('#notesResult').html(data);

}



});


})


});

setInterval(function() {
  $('#refresh_btn3').click();
}, 1000);

//refresh3



//refresh2
$(document).ready(function(){
  $('#refresh_btn2').click(function(e){

      e.preventDefault();
       
        $.ajax({

                 method: "post",
                 url:"controller.php",
                 data : $('#habitsDisplay').serialize(),
                 dataType: "html",
                 success: function(data){
                      $('#crudResult').html(data);

}



});


})


});

setInterval(function() {
  $('#refresh_btn2').click();
}, 1000);

//refresh2














//edit your habits
$(document).ready(function(){
  $('#add_btn').click(function(e){

      e.preventDefault();
       
        $.ajax({

                 method: "post",
                 url:"controller.php",
                 data : $('#crud_form').serialize(),
                 dataType: "html",
                 success: function(data){
                      //let content = JSON.parse(data);
                      //let content = JSON.stringify(data);
                      //console.log(data);
                      $('#crudResult').html(data);
                      $("#msg2Input").val("");
                      
                      //$('#chatsDiv').html(content);

}



});


})


});

//edit your habits

//del_btn

$('#crudResult').on('click','.del_btn',function(){
  let i = $(this).attr('id');
   $("#msg3Input").val(i);
      

 $.ajax({

                 method: "post",
                 url:"controller.php",
                 data : $('#del_form').serialize(),
                 dataType: "html",
                 success: function(data){
                      
                           console.log('deleted check database');                 
                      
                      
                      
                      

}



})








});
//del_btn


//edit_btn
$('#crudResult').on('click','.edit_btn',function(){
  let i = $(this).attr('id');
   $("#msg4Input").val(i);
      

 $.ajax({

                 method: "post",
                 url:"controller.php",
                 data : $('#edit_form').serialize(),
                 dataType: "html",
                 success: function(data){
                       let response = JSON.parse(data);
                           //console.log(response);                 
                       let habitName = response[0]["habit_name"];
                      //console.log(habitName);
                      let type = response[0]["type"];
                      //console.log(type);
                      $('#msg2Input').val(habitName);
                      $('#msgSelect').val(type);
                      

}



})








});







//edit_btn

//notes



$(document).ready(function(){
  $('#addNotes').click(function(e){

      e.preventDefault();
       
        $.ajax({

                 method: "post",
                 url:"controller.php",
                 data : $('#notes_form').serialize(),
                 dataType: "html",
                 success: function(data){
                      //let content = JSON.parse(data);
                      //let content = JSON.stringify(data);
                      console.log('inserted');
                      //$('#notesResult').html(data);
                      
                      

}



});


})


});




//notes
//rank


$(document).ready(function(){
  $('#rank_btn').click(function(e){

      e.preventDefault();
       
        $.ajax({

                 method: "post",
                 url:"controller.php",
                 data : $('#rank_form').serialize(),
                 dataType: "html",
                 success: function(data){
                      //let content = JSON.parse(data);
                      //let content = JSON.stringify(data);
                      //console.log('inserted');
                      $('#rankingResult').html(data);
                      
                      

}



});


})


});









//rank



//search



$(document).ready(function(){
  $('#sBtn').click(function(e){

      e.preventDefault();
       
        $.ajax({

                 method: "post",
                 url:"controller.php",
                 data : $('#s_form').serialize(),
                 dataType: "html",
                 success: function(data){
                      //let content = JSON.parse(data);
                      //let content = JSON.stringify(data);
                      //console.log('inserted');
                      $('#sResult').html(data);
                      
                      

}



});


})


});




//search



//prog

$(document).ready(function(){
  $('#p_btn').click(function(e){

      e.preventDefault();
       
        $.ajax({

                 method: "post",
                 url:"controller.php",
                 data : $('#p_form').serialize(),
                 dataType: "html",
                 success: function(data){
                      //let content = JSON.parse(data);
                      //let content = JSON.stringify(data);
                      //console.log('inserted');
                      $('#pResult').html(data);
                      
                      

}



});


})


});





//prog

setInterval(function() {
  $('#info').hide();
}, 20000);

<?php
if(!empty($display_modal_window)){
if($display_modal_window == 'no-modal-window');
else if ($display_modal_window == 'reset') echo 'show_resetDiv();';
else if ($display_modal_window == 'chatBox') echo 'show_chatBox();';

else;
}
?>


</script>
</html>



