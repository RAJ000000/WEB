<?php
//connection to database
$conn = mysqli_connect('localhost', 'w3sraj', 'w3sraj136', 'C354_w3sraj');

//function to validitate username and password from the log in window

function username_password_valid($username, $password) { 
    global $conn;
    $sql ="select * from users where username = '$username' and password = '$password'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) >0)
        return true;
    else
        return false;
}

//function to check if the username already exists in users table that will also be called in the sign up new user function
function username_exists($username) {  
    global $conn;
    $sql = "select * from users where username = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) >0)
        return true;
    else
        return false;
}

//function to insert a new user in to the databse, call username exists function
function signup_a_new_user($username,$password,$email) {
    global $conn;
    $current_date = date("Ymd");
    if(username_exists($username))
    {
     return false;
    }
    else
    {  
    $sql = "insert into users values(null,'$username','$password','$email',$current_date)";
    $result = mysqli_query($conn,$sql);
    return $result;
    }
}


//searchterm function

function search_users($term) {
    global $conn;
    $sql = "select username from users where username like '%$term%';";
    $result = mysqli_query($conn,$sql);
    $data=[];
    if(mysqli_num_rows($result) >0)
      while($row=mysqli_fetch_assoc($result))
          $data[] = $row;

    return $data;
       
    
}


//save a message function

function save_message($sender,$receiver,$message){
      global $conn;
           $current_date = date("Ymd");
        $sql = "insert into messages values(null,'$sender','$receiver','$message',$current_date,0);";
            mysqli_query($conn,$sql);
        $sql2 = "select receiver,message from messages order by id desc limit 1;";
            $result = mysqli_query($conn,$sql2);

           $data=[];
            if(mysqli_num_rows($result) >0)
              while($row=mysqli_fetch_assoc($result))
                    $data[] = $row;

    return $data;


}
//function to read meassage
function read_messages($receiver){
  global $conn;
     $sql="select * from messages where receiver = '$receiver' and readornot = 0;";
          $result = mysqli_query($conn,$sql);
     $sql2="update messages set readornot = 1 where receiver = '$receiver' and readornot = 0;";
           mysqli_query($conn,$sql2);
     $data=[];
     if(mysqli_num_rows($result) >0)
             while($row=mysqli_fetch_assoc($result))
                    $data[] = $row;

    return $data;



}

//function to create a table
function create_table($data) {
    $str = "<table>";
   


$str .= "<tr>";
     foreach($data[0] as $n => $v){
       $str .= '<th>'  . $n . '</th>';
     }  
$str .= "</tr>";


    for($i = 0; $i < count($data);$i++)
{

     $str .= "<tr>";
     foreach($data[$i] as $n => $v){
       $str .= '<td>'  . $v . '</td>';
     }  
        $str .= "</tr>";
}
   
    $str .= "</table>";
    return $str;
}


?>