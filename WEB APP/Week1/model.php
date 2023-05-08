<?php
//connection to database
$conn = mysqli_connect('localhost', 'w3sraj', 'w3sraj136', 'C354_w3sraj');

//function to validitate username and password from the log in window

function email_password_valid($email, $password) { 
    global $conn;
    $sql ="select * from habits_users where email = '$email' and password = '$password'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) >0)
        return true;
    else
        return false;
}

//function to check if the username already exists in users table that will also be called in the sign up new user function
function email_exists($email) {  
    global $conn;
    $sql = "select * from habits_users where email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) >0)
        return true;
    else
        return false;
}

//function to insert a new user in to the databse, call username exists function
function signup_a_new_user($fullname,$email,$password) {
    global $conn;
    $current_date = date("Ymd");
    if(email_exists($email))
    {
     return false;
    }
    else
    {  
    $sql = "insert into habits_users values(null,'$fullname','$email','$password',$current_date)";
    $result = mysqli_query($conn,$sql);
    return $result;
    }
}

//function to delete user account
function delete_user($email){
global $conn;
$sql = "delete from habits_users where email = '$email';";
mysqli_query($conn,$sql);


}

//function to update password old to new pass

function update_password($email,$oldPassword,$newPassword){
global $conn;

$sql=" update habits_users set password = '$newPassword' where email='$email' and password='$oldPassword';";
mysqli_query($conn,$sql);

}

//function to check password exits
function check_password($password) {  
    global $conn;
    $sql = "select * from habits_users where password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) >0)
        return true;
    else
        return false;
}

//function to insert function
function insert_chat($email,$chat){
global $conn;
//$current_date = date("Ymd");
//$current_date = date('H:i:s');
$sql ="insert into habits_users_chat values(null,'$email','$chat',now());";
mysqli_query($conn,$sql);

}

//function display in the chat box
function display_chats(){
global $conn;
$sql="select date,email,chat from habits_users_chat where chat != '' order by id desc;";
$result = mysqli_query($conn,$sql);
$data =[];
if(mysqli_num_rows($result) >0)
      while($row=mysqli_fetch_assoc($result))
          $data[] = $row;

    return $data;




}

//function to create a table
function create_table($data) {
    $str = "<table style = 'border:1px solid red; '>";
   


$str .= "<tr>";
     foreach($data[0] as $n => $v){
       $str .= '<th>'  . $n . '</th>';
     }  
$str .= "</tr>";


    for($i = 0; $i < count($data);$i++)
{

     $str .= "<tr>";
     foreach($data[$i] as $n => $v){
       $str .= "<td style = 'border:1px solid red; '>" . $v . '</td>';
     }  
        $str .= "</tr>";
}
   
    $str .= "</table>";
    return $str;
}

//function to check existing habits
function habit_exists($habitName,$username) {  
    global $conn;
    $sql = "select * from habits where habit_name = '$habitName'and user='$username';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) >0)
        return true;
    else
        return false;
}




//function to insert habits function
function insert_habit($habitName,$type,$username){
global $conn;
if(habit_exists($habitName,$username)){
$sql2="update habits set habit_name='$habitName',type='$type' where habit_name='$habitName';";
mysqli_query($conn,$sql2);
}
else{
$sql ="insert into habits values(null,'$habitName','$type','$username');";
mysqli_query($conn,$sql);
}
}

//function display habits
function display_habits($username){
global $conn;
$sql="select habit_name,type,user,id from habits where user = '$username' order by id desc;";
$result = mysqli_query($conn,$sql);
$data =[];
if(mysqli_num_rows($result) >0)
      while($row=mysqli_fetch_assoc($result))
          $data[] = $row;

    return $data;




}

//function to create a table
function create_table_habits($data) {
    $str = "<table style = 'border:1px solid red; '>";
   

/*
$str .= "<tr>";
     foreach($data[0] as $n => $v){
       $str .= '<th>'  . $n . '</th>';
     }  
$str .= "</tr>";
*/

    for($i = 0; $i < count($data);$i++)
{

     $str .= "<tr>";

     foreach($data[$i] as $n => $v){
       $str .= "<td style = 'border:1px solid red; '>" . $v."</td>";
     }  
        $x = $v ;
        $str .= "<td><button id='$x' class='edit_btn' >edit</button></td>";
        $str .= "<td><button id='$x' class='del_btn' >delete</button></td>";
        $str .= "</tr>";
}
   
    $str .= "</table>";
    return $str;
}

//functon to delete a habit
function delete_habits($id){
global $conn;
$sql="delete from habits where id = '$id';";
mysqli_query($conn,$sql);
}

//function to get the info to be edited
function edit_habits($id){
global $conn;
$sql = "select habit_name,type from habits where id='$id';";
$result = mysqli_query($conn,$sql);
$data =[];
if(mysqli_num_rows($result) >0)
      while($row=mysqli_fetch_assoc($result))
          $data[] = $row;

    return $data;


}

//function to insert notes
function insert_notes($notes,$username){
global $conn;
$current_date = date("Ymd");
//$current_date = date('H:i:s');
$sql ="insert into notes values(null,'$notes',$current_date,'$username');";
mysqli_query($conn,$sql);

}


//function display notes
function display_notes($username){
global $conn;
$sql="select * from notes where user='$username' order by id desc;";
$result = mysqli_query($conn,$sql);
$data =[];
if(mysqli_num_rows($result) >0)
      while($row=mysqli_fetch_assoc($result))
          $data[] = $row;

    return $data;




}
//function display rank
function show_ranking($username){
global $conn;
$sql="select user,count(*) as 'rank'  from habits where type='good' group by user order by count(*) desc;";
$result = mysqli_query($conn,$sql);
$data =[];
if(mysqli_num_rows($result) >0)
      while($row=mysqli_fetch_assoc($result))
          $data[] = $row;

    return $data;




}

//searchterm function

function search_users($term) {
    global $conn;
    $sql = "select * from habits where user like '%$term%' and type='good';";
    $result = mysqli_query($conn,$sql);
    $data=[];
    if(mysqli_num_rows($result) >0)
      while($row=mysqli_fetch_assoc($result))
          $data[] = $row;

    return $data;
       
    
}

//function to show name,email,doj

function show_user_details($username) {
    global $conn;
    $sql = "select fullname,email,date from habits_users where email='$username';";
    $result = mysqli_query($conn,$sql);
    $data=[];
    if(mysqli_num_rows($result) >0)
      while($row=mysqli_fetch_assoc($result))
          $data[] = $row;

    return $data;
       
    
}


//function to show habits statistics

function show_user_habits($username) {
    global $conn;
    $sql = "select habit_name,type from habits where user='$username';";
    $result = mysqli_query($conn,$sql);
    $data=[];
    if(mysqli_num_rows($result) >0)
      while($row=mysqli_fetch_assoc($result))
          $data[] = $row;

    return $data;
       
    
}


//function to show habits total

function show_user_totals($username) {
    global $conn;
    $sql = "select type as 'type of habit',count(*) as 'total' from habits where user='$username' group by type;";
    $result = mysqli_query($conn,$sql);
    $data=[];
    if(mysqli_num_rows($result) >0)
      while($row=mysqli_fetch_assoc($result))
          $data[] = $row;

    return $data;
       
    
}



?>