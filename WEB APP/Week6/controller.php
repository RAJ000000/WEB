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
                $username = $_POST['username'];
                $password = $_POST['password'];
                $command  = $_POST['command'];

                    switch($command)
                     {


                         case 'Login':
                             if(username_password_valid($username,$password))
                                 {
                                      include('view_mainpage.php');
                                 }//logic if end

                             else{
                                      $display_modal_window = 'LogIn';
                                      $msgInvalid = "<span style = 'background-color:red'><strong>Invalid Sign in - PLEASE USE A CORRECT USERNAME AND PASSWORD TO SIGN IN</strong></span>";
                                      include('view_startpage.php');
                                 }//logic else end

                                 exit();



                               //default
                               default:
                                  echo "<span style = 'background-color:red; font-size:50px'><strong>SIGN UP NOT SUCCESSFULL => SIGN UP FUNCTIONALITY NOT CREATED ON THIS SITE YET 
                                      => NO DATABASE CONNECTION TO SAVE USER</strong></span> <br><br>";

                                exit();
                       }//end of switch


                }//end of startpage if



                //mainpage
                  else if ($page == 'MainPage')
                        {
                             $command  = $_POST['command'];
                                 switch($command)
                                        {
                                                    case 'LogOut':
                                                    include('view_startpage.php');
                                                    exit();


                                                    default:
                                                    echo 'UNKNOWN COMMAND CHECK THE INVISIBLE FORM';
                                                    exit(); 


                                          }

                         }//mainpage if end

?>