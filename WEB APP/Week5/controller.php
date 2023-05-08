<?php


        if(empty($_POST['page'])){
            include('Assign5.php');
               exit();

                  }//end of if

        //variables
            $page = $_POST['page'];

        //to check page values
           if($page == 'StartPage')
             {

                 $username = $_POST['username'];
                 $password = $_POST['password'];

                          //command to use in switch
                                  $command = $_POST['command'];

                                       switch($command){

                                           case 'Login':
                                              //case login logic

                                                   //function retuns true then...

                                                       if(validitate_login($username,$password))
                                                               {

                                                                   $msgValid = "<span style = 'background-color:green'><strong>Valid Sign in - LOG IN SUCCESSFUL -MAINPAGE DNE -INCLUDE(mainpage.html)</strong></span>";
                                                                        include('Assign5.php');
                                                               }

                                                   //function returns false then...
                                                       else
                                                              {

                                                                   $msgInvalid = "<span style = 'background-color:red'><strong>Invalid Sign in - PLEASE USE A CORRECT USERNAME AND PASSWORD TO SIGN IN</strong></span>";
                                                                        include('Assign5.php');
                                                              }
                                               //case login logic ends
                                                               exit();



                                              default:
                                              echo 'UNKNOWN COMMAND' ;
                                              exit();


                                             }//end of switch


                   }//end of if

                   else if ($page == 'MainPage')
                          {
                             $command = $_POST['command'];


                                switch($command){

                                    case 'ListQuestions':


                                           $data = A();
                                           $str = B($data);
                                           echo $str;
                                           //include('Assign5.php');

                                           exit();


                                    default:
                                           echo 'UNKNOWN COMMAND' ;
                                           exit(); 


                                          }

                              }//end of else



//function to verify username and password

    function validitate_login($username,$password)
    {
          if($username == 'comp3540' && $password == 'topsecret'){
           return true;
    }else{return false;}

    }//end of function

//function to create an array
      function A()
          {
            $data = [
                    ["Question" => "How big is universe?   ", "Date" => 20221017],
                    ["Question" => "What is the light speed?   ", "Date" => 20221017]
                    ];
                    return $data;
                    }

//function to create a table
function B($data) {
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

?>//end of php