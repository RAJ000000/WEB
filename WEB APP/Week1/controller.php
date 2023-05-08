<?php
    if(empty($_POST['page']))
     {
         $display_modal_window = 'no-modal-window';
         include('startpage.php');
         exit();
     }

     include('model.php');//require

     //variables
     $page = $_POST['page'];
     
     //check values of the page
     //startpage
           if($page == 'startpage')
              {
                //only add common variables in forms here otherwise it will how error like the $email var
                $email    = $_POST['email'];
                $password = $_POST['password']; 
                $command  = $_POST['command'];

                    switch($command)
                     {


                         case 'signin':
                             if(email_password_valid($email,$password))
                                 {
                                      session_start();
                                      $_SESSION['signedin'] = 'YES';
                                      $_SESSION['username'] = $email ;
                                      include('mainpage.php');
                                 }//logic if end

                             else{
                                      $display_modal_window = 'LogIn';
                                      $msgInvalid = "<span style = 'background-color:red'><strong>Invalid Sign in - PLEASE USE A CORRECT USERNAME AND PASSWORD TO SIGN IN<br> or sign up</strong></span>";
                                      include('startpage.php');
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
case 'signup':
$fullname    = $_POST['fullname']; 

if(email_exists($email))
{
$display_modal_window = 'SignUp';
$msgUserExists = "<span style = 'background-color:black; color:white; margin-left:5px; border:5px solid red;'><strong>Limit reached, use a different email to sign up</strong></span>";
include('startpage.php');
}
else if(signup_a_new_user($fullname,$email,$password))
{
$display_modal_window = 'LogIn';
$msgUserInserted = "<span style = 'background-color:green'><strong> you are registered, please log in here</strong></span>";
include('startpage.php');
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
                   
                  else if ($page == 'mainpage')
                        {
                             session_start();
                             if (!isset($_SESSION['signedin'])) {
                             include('startpage.php');
                             exit;
                             }

                             $command  = $_POST['command'];
                             
                                 switch($command)
                                        {
                                                    case 'chat':
                                                    insert_chat($_SESSION['username'], $_POST['chat']);
                                                    $data = display_chats();
                                                    $str = create_table($data);
                                                    echo $str;
                                                    //var_dump ($data);
                                                    //$jsonObj = json_encode($data);
                                                    //echo $jsonObj;
                                                    //$display_modal_window = 'chatBox';                                                  
                                                    //include('mainpage.php');
                                                    exit();
                                                    
                                                    case 'Habits':
                                                    insert_habit($_POST['habitName'],$_POST['type'],$_SESSION['username']);
                                                    //$data = display_habits();
                                                    //$str = create_table_habits($data);
                                                    //echo $str;
                                                    exit();

                                                    case 'deleteHabits':
                                                    delete_habits($_POST['id']);                                                    
                                                    exit();


                                                    case 'resetPassword':
                                                    if(check_password($_POST['oldPassword']))
                                                    {
                                                    update_password($_SESSION['username'],$_POST['oldPassword'],$_POST['newPassword']);
                                                    $display_modal_window = 'reset';
                                                    $msg_reset ='New Password Updated';                                                  
                                                    include('mainpage.php');
                                                    
                                                    }
                                                    else
                                                    {
                                                    $display_modal_window = 'reset';
                                                    $msg_reset ='Old Password is incorrect';
                                                    include('mainpage.php');
                                                    
                                                    }

                                                    exit();

                                                    case 'deleteAccount':
                                                    delete_user($_SESSION['username']);                                                  
                                                    include('startpage.php');
                                                    exit();
                                                    
                                                    case 'displayHabits':
                                                    $data = display_habits($_SESSION['username']);
                                                    $str = create_table_habits($data);
                                                    echo $str;
                                                    exit();


                                                    case 'prog':
                                                    $data = show_user_details($_SESSION['username']);
                                                    $str = create_table($data);
                                                    echo $str;
                                                    $data2=show_ranking($_SESSION['username']);
                                                    $str2 = create_table($data2);
                                                    echo $str2;
                                                    $data3 = show_user_habits($_SESSION['username']);
                                                    $str3 = create_table($data3);
                                                    echo $str3;
                                                    $data4 = show_user_totals($_SESSION['username']);
                                                    $str4 = create_table($data4);
                                                    echo $str4;
                                                    
                                                    exit();
                                                    
                                                    case 'displayRanking':
                                                    $data=show_ranking($_SESSION['username']);
                                                    $str = create_table($data);
                                                    echo $str;
                                                    exit();


                                                    case 'searchUser':
                                                    $term = $_POST['user'];
                                                    $searched = search_users($term);
                                                    $str = create_table($searched);
                                                    echo $str;
                                                    //var_dump($searched);
                                                    exit();

                                                    case 'postNotes':
                                                    insert_notes($_POST['notes'],$_SESSION['username']);
                                                     exit();


                                                    case 'showNotes':
                                                    $data=display_notes($_SESSION['username']);
                                                    $str = create_table($data);
                                                    echo $str;
                                                    exit();

                                                    case 'logout':
                                                    session_unset();
                                                    session_destroy();
                                                    include('startpage.php');
                                                    exit();
                                                    
                                                    

                                                    

                                                    case 'editHabits':
                                                    $data = edit_habits($_POST['id']);                                                    
                                                    $jsonObj = json_encode($data);                                                   
                                                    echo $jsonObj;
                                                    
                                                    exit();
                                                    
                                                    
                                                    
                                                    
                                                    case 'displayChats':
                                                    $data = display_chats();
                                                    $str = create_table($data);
                                                    echo $str;
                                                    
                                                    
                                                    exit();


                                                    default:
                                                    echo 'UNKNOWN COMMAND CHECK THE FORMS';
                                                    exit(); 


                                          }

                         }//mainpage if end

?>