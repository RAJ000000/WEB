<?php
    if(empty($_POST['page']))
     {
         $display_modal_window = 'no-modal-window';
         include('view_startpage.php');
         exit();
     }

     include('model.php');//require

     //variables
     $page = $_POST['page'];

     //check values of the page
     //startpage
           if($page == 'StartPage')
              {
                //only add common variables in forms here otherwise it will how error like the $email var
                $username = $_POST['username'];
                $password = $_POST['password'];
                //$email    = $_POST['email']; //have to add this variable for sign up
                $command  = $_POST['command'];

                    switch($command)
                     {


                         case 'Login':
                             if(username_password_valid($username,$password))
                                 {
                                       session_start();
                                       $_SESSION['signedin'] = "YES";
                                       $_SESSION['username'] = $username ;
                                      include('view_mainpage.php');
                                 }//logic if end

                             else{
                                      $display_modal_window = 'LogIn';
                                      $msgInvalid = "<span style = 'background-color:red'><strong>Invalid Sign in - PLEASE USE A CORRECT USERNAME AND PASSWORD TO SIGN IN<br> or sign up</strong></span>";
                                      include('view_startpage.php');
                                 }//logic else end

                                 exit();
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//details: when sign up btn is clicked, user is prompted to enter u,p,e
// then the controller takes over 

//case 1
// if user already exists then it will show sign up popup with a error msg = user already exits, sign up unsuccessful,
//try with a different username or log in <a> this will use the model func user_exists($u);

//case 2
//new user tries signing up 
//in this case log in  pop up will show with a error msg = user registered, please log in.
                       
//Sign up case
case 'Signup':
$email    = $_POST['email']; 
if(username_exists($username))
{
$display_modal_window = 'SignUp';
$msgUserExists = "<span style = 'background-color:red'><br><strong>user already exists-sign up unsuccessful-please log in with this username or sign up using a different username</strong></span>";
include('view_startpage.php');
}
else if(signup_a_new_user($username,$password,$email))
{
$display_modal_window = 'LogIn';
$msgUserInserted = "<span style = 'background-color:green'><strong> you are registered, please log in here</strong></span>";
include('view_startpage.php');
}
exit();


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                               //default
                               default:
                                  echo "<span style = 'background-color:red; font-size:50px'><strong>THIS PAGE DOES NOT EXIST</strong></span> <br><br>";

                                exit();
                       }//end of switch


                }//end of startpage if



                //mainpage
                  else if ($page == 'MainPage')
                        {
                             session_start();
                             if (!isset($_SESSION['signedin'])) {
                             include('view_startpage.php');
                             exit;
                             }
                             $command  = $_POST['command'];
                                 switch($command)
                                        {           
                                                    case 'SearchFriends':
                                                    $term = $_POST['search'];
                                                    $searched = search_users($term);
                                                    //echo var_dump($searched);
                                                    //var_dump(search_users($term));                                                    
                                                      include('view_mainpage.php');
                                                    exit();


                                                    case 'SendMessage':
                                                    $sent = save_message($_SESSION['username'],$_POST['receiver'],$_POST['message']);
                                                    $str = create_table($sent);
                                                    echo $str;
                                                    //include('view_mainpage.php');
                                                    exit();

                                                    case 'ReadMessages':
                                                    $unread = read_messages($_SESSION['username']);
                                                    var_dump($unread);
                                                    
                                                    exit();

                                                    case 'LogOut':
                                                    session_reset();
                                                    session_destroy();
                                                    include('view_startpage.php');
                                                    exit();


                                                    default:
                                                    echo 'UNKNOWN COMMAND CHECK THE INVISIBLE FORM';
                                                    exit(); 


                                          }

                         }//mainpage if end

?>