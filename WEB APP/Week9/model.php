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

?>