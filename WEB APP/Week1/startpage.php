<!--
    Project Name:----------Habits
    Name:------------------SHIKHAR RAJ
    T-ID:------------------T00672347
    Details:---------------Web App that tracks your habits.
    HTML Page description:-This HTML page contains sign up and sign in functions.
    
-->
<!DOCTYPE html>
<html>
    <!--CSS styles-->
    <style>
        body{
            overflow: hidden;
            color: white;
            font-family: sans-serif;
        }
        #topbar{
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            background-color: black;
            z-index: 10;
        }
        #list{
            list-style: none;
            font-size: larger;
            font-weight: bolder;
        }
        #topbar > ul > li{
            display: inline-block;
            
        }
        #content{
            position: absolute;
            height: 100%;
            width: 100%;
            left: 0%;
            background-color: gray;
            z-index: 9;
        }
        #footer{
            position: absolute;
            bottom: 0%;
            height: 12%;
            width: 100%;
            left: 0%;
            background-color: black;
            z-index: 10;
        }
        #footer > h3, #footer > p{
            margin-left: 2%;
        }
        #subContent1{
            position: absolute;
            top: 15%;
            width: 50%;
            left:1%;
            color: black;
        }
        #signin_block{
            display: none;
            position: absolute;
            top: 20%;
            width: 25%;
            left: calc(100% - 60%);
            height: 50%;
            background-color: white;
            color: black;
            border: 1px solid black;
            z-index: 11;

        }
        #signup_block{
            display: none;
            position: absolute;
            top: 15%;
            width: 25%;
            left: calc(100% - 60%);
            height: 70%;
            background-color: white;
            color: black;
            border: 1px solid black;
            z-index: 11;

        }
        .inputs{
            height: 50px;
            font-size: x-large;
            margin-left: 2%;
            margin-top: calc(25% - 20%);
        }
        
        label{
            font-weight: bolder;
            font-size: larger;
            margin-left:2%;
            

        }
        #video{
            position: absolute;
            right: 5%;
            top:25%;
        }
        #blanket{
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            height: 100%;
            width: 100%;
            background-color: black;
            opacity: 0.8;
            z-index: 10;
        }
        #topbar > ul >li:hover{
            border-bottom: 5px solid white;
            cursor: pointer;
            border-radius: 10%;
            box-sizing: border-box;

        }
        
        
    </style>
    <!--CSS styles ends here-->
    <head>
        <title>Habit Tracker</title>
        <link rel="icon" href="h.png" type="image/icon type">
    </head>
    <body>
<!--------------------------------------------------------------------------------------------------------------------------->

        <div id="topbar"><!-- nav bar starts here-->
            <ul id="list">
                <li style="font-weight: 900px; font-size: xx-large; padding-left: 0%; margin-left: 0%;">Habits</li>
                <li id="topbar_signin" style="margin-left: 80%; padding-right: 2%; cursor: pointer;">Sign In</li>
                <li id="topbar_signup" style="cursor: pointer;">Sign Up</li>
            </ul>
        </div><!--nav bar ends here toggles sign in and sing up divs-->
<!--------------------------------------------------------------------------------------------------------------------------->
        <div id="content"><!--middle content starts here-->
            

            <!--******************************************************************************************************************-->
            <div id="subContent1"><!--About website starts here-->
                <h2>Habit Tracker: Monitor Your Progress</h2>
                   <p>Welcome to Habit Tracker,
                        the best tool for establishing and keeping good habits. 
                          Our user-friendly platform is here to help,
                           whether you're attempting to exercise frequently,
                            drink more water, or simply want to be more productive.
                    </p>

                    <h2>How Does Habit Tracker Work?</h2>
                    <p>
                        Our user-friendly interface makes it simple
                         to establish and monitor your habits, and we provide 
                         customised reminders to help you stay on track. You'll also be able to clearly 
                         see your progress and how far you've come thanks to a range of metrics and progress reports.
                    </p>
                    <h2>Features</h2>
                    <ul>
                        <li>Make unique routines and objectives.</li>
                        <li>tracking on a daily, weekly, and monthly basis</li>
                        <li>reminders</li>
                        <li>Analytics and status updates</li>
                        <li>Communal assistance and inspiration</li>
                        <li>private and safe platform</li>

                    </ul>

            </div><!--About website ends-->
            <!--******************************************************************************************************************-->


            <!--******************************************************************************************************************-->
            <div id="subContent2"><!--contains sign in and sing up divs--->
                <iframe id="video" width="560" height="315" src="https://www.youtube.com/embed/wwQdRfN141Y"
                 title="YouTube video player" frameborder="0" allow="accelerometer;
                  autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;
                   web-share" allowfullscreen>
                </iframe>

                <div id="signin_block"><!--sign in forms starts here-->
                    <button id="remove_btn" style="position: absolute;
                     right: 0%; cursor: pointer; font-weight: bolder;
                      background-color: black; color: white;">X</button>
                    <h2 style="margin-left: 2%; font-size: xx-large;" >Sign In</h2><br>
                    <form method="post" action="controller.php">
                        <input type="hidden" name="page" value="startpage">
                        <input type="hidden" name="command" value="signin">
                        <label for="email">Email</label><br>
                        <input type="email" name="email" placeholder="####@###.com" required class="inputs"><br><br>
                        <label for="password">Password</label><br>
                        <input type="password" name="password" placeholder="******" required class="inputs"><br><br>
                        <?php if(!empty($msgInvalid)) echo $msgInvalid ?>
                        <?php if(!empty($msgUserInserted)) echo $msgUserInserted?>
                        <br>
                        <input type="submit" name="submit" value="submit"
                         style="position: absolute; bottom: 5%;
                          font-size: larger; margin-left: 2%; cursor: pointer;
                          background-color: black; color: white;">


                    </form>

                </div><!--sign in form ends here-->



                <div id="signup_block"><!--sign up forms starts here-->
                    <button id="remove_btn2" style="position: absolute;
                     right: 0%; cursor: pointer;font-weight: bolder;
                      background-color: black; color: white;">X</button>
                    <h2 style="margin-left: 2%; font-size: xx-large;" >Sign Up</h2>
                    <?php if(!empty($msgUserExists)) echo $msgUserExists ?>
                    <form method="post" action="controller.php">
                        <input type="hidden" name="page" value="startpage">
                        <input type="hidden" name="command" value="signup">
                        <label for="fullname">Full Name</label><br>
                        <input type="text" name="fullname" placeholder="John Doe" required class="inputs"><br><br>
                        <label for="email">Email</label><br>
                        <input type="email" name="email" placeholder="####@###.com" required class="inputs"><br><br>
                        <label for="password">Password</label><br>
                        <input type="password" name="password" placeholder="******" required class="inputs"><br><br>
                        <input type="submit" name="submit" value="submit"
                         style="position: absolute; bottom: 5%;
                          font-size: larger; margin-left: 2%; cursor: pointer;
                          background-color: black; color: white;">


                    </form>

                </div><!--sign up form ends here-->


                <div id="blanket"></div>




            </div><!--end of sub content 2-->
            <!--******************************************************************************************************************-->


        </div><!--middle content-ends-->



<!--------------------------------------------------------------------------------------------------------------------------->

        <div id="footer"><!--footer starts here-->
            <h3>Start right away</h3>

                <p>To start tracking your habits and
                    accomplishing your goals,
                    sign up right away. Success is just a few clicks
                    away with Habit Tracker.</p>
        </div><!--footer ends-->
<!--------------------------------------------------------------------------------------------------------------------------->


    </body>
    <script>
        let show_div_signin = document.getElementById('topbar_signin');
        let show_div_signup = document.getElementById('topbar_signup');
        let container_signin = document.getElementById('signin_block');
        let container_signup = document.getElementById('signup_block');
        let cancelbtn = document.getElementById('remove_btn');
        let cancelbtn_2 = document.getElementById('remove_btn2');
        let cover = document.getElementById('blanket');

        show_div_signin.addEventListener('click',function(){
            container_signin.style.display='block';
            cover.style.display='block';
            container_signup.style.display='none';

        });
        show_div_signup.addEventListener('click',function(){
            container_signup.style.display='block';
            cover.style.display='block';
            container_signin.style.display='none';

        });


        cancelbtn.addEventListener('click', function(){
            container_signin.style.display='none';
            cover.style.display='none';
            
        });
        cancelbtn_2.addEventListener('click', function(){
            container_signup.style.display='none';
            cover.style.display='none';
        });
        cover.addEventListener('click',function(){
            container_signin.style.display='none';
            container_signup.style.display='none';
            cover.style.display='none';

        });



function show_login(){
    document.getElementById('signin_block').style.display = 'block';
    document.getElementById('blanket').style.display = 'block';

}
function show_signup(){
    document.getElementById('signup_block').style.display = 'block';
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
</html>