<?php 

    // Check If The User Coming From A Request
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Assign Variables

        $user  = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $msg   = filter_var($_POST['msg'], FILTER_SANITIZE_STRING);

        // Creating Array Of Errors

        $formErrors = array();

        if(strlen($user) <= 3 ) {

            $formErrors[] = 'username must be greater than <strong> 3 </strong> letters' ;

        }

        if(strlen($msg) < 10 ) {

            $formErrors[] = 'message can\'t be less than <span> 10 </span> letters' ;
            
        }

        // If there is no error send the email [ mail (to , subject, message, parameters) ]

        $headers = 'From: ' . $user . "\r\n" . $email . "\r\n";         
        $myEmail = 'ab989b25@gmail.com';
        $subject = 'contact form';

        if( empty($formErrors)) {

            mail( $myEmail, $subject, $msg, $headers);

            $user  = '' ;
            $email = '' ;
            $phone = '' ;
            $msg   = '' ;

            $success = ' <div class= "alert alert-success" > We Have Recieved Your Details  </div>';
        }

    }

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Contact Form</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontawesome.min.css"> <!--This one is  not working check it back -->
        <link rel="stylesheet" href="css/contact.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700&display=swap">
    </head>
    <body>
        <!-- Start Form -->
        <div class="container">
            <h1 class="text-center"> Contact Us</h1>
            <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <?php if( ! empty($formErrors)) { ?>
                <div class="alert alert-danger alert-dismissible" role="start">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <?php
                        foreach($formErrors as $error) {
                            echo $error . '<br/>';
                        }
                    ?>
                </div>
                <?php  } ?>
                <?php if(isset($success)) { echo $success ;} ?>
                <div class="form-group">
                    <input
                            class="username form-control"
                            type="text"
                            name="name"
                            placeholder="Your Name"
                            value="<?php if (isset($user)) { echo $user; } ?>">
                    <i class="fa fa-user fa-fw"></i>
                    <span class="asterisx" > * </span>
                    <div class="alert alert-danger custom-alert"> 
                        Username must be greater than <strong> 3 </strong> letters
                    </div>
                </div>
                <div class="form-group">
                    <input 
                            class="email form-control"
                            type="email"
                            name="email"
                            placeholder="Your Email"
                            value="<?php if (isset($email)) { echo $email; } ?>">
                    <i class="fa fa-envelope fa-fw"></i>
                    <span class="asterisx" > * </span>
                   <div class="alert alert-danger custom-alert"> 
                            Email can't be  <span> empty </span>
                    </div> 
                </div>
                <input
                        class="form-control"
                        type="text"
                        name="phone"
                        placeholder="Your Mobile"
                        value="<?php if (isset($phone)) { echo $phone; } ?>">

                <i class="fa fa-phone fa-fw"></i>
                <div class="form-group">
                    <textarea 
                            class="message form-control"
                            name="msg"
                            placeholder="Your Massage!"><?php
                             if (isset($msg)) { echo $msg; } ?></textarea>
                    <span class="asterisx" > * </span>
                    <div class="alert alert-danger custom-alert "> 
                          Message can't be less than <span> 10 </span> letters
                    </div>
                </div>
                <input 
                        class="btn btn-success"
                        type="submit"
                        value="Send Message" />
                <i class="fa fa-send fa-fw send-icon"></i>
            </form>
        </div>
        <!-- End   Form -->  


        <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/fontawesome.min.js"></Script>
        <script src="js/custom.js"></script>
    </body>
</html>