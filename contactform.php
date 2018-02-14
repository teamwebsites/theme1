<?php

/*

Template Name: Contact

*/

?>



<?php

 

  //response generation function

 

  $response = "";

 

  //function to generate response

  function generate_response($type, $message){

   

    global $response;

 

    if($type == "success") $response = "<div class='success'>{$message}</div>";

    else $response = "<div class='error'>{$message}</div>";

   

  }

 

  //response messages

  $not_human       = "Human verification incorrect.";

  $missing_content = "Please supply all information.";

  $email_invalid   = "Email Address Invalid.";

  $message_unsent  = "Message was not sent. Try Again.";

  $message_sent    = "Thanks! Your message has been sent.";

 

  //user posted variables

  $name = $_POST['message_name'];

  $email = $_POST['message_email'];

  $message = $_POST['message_text'];

  $human = $_POST['message_human'];

 

  //php mailer variables

  $to = get_option('admin_email');

  $subject = "Someone sent a message from ".get_bloginfo('name');

  $headers = 'From: '. $email . "\r\n" .

    'Reply-To: ' . $email . "\r\n";

 

  if(!$human == 0){

    if($human != 2) generate_response("error", $not_human); //not human!

    else {

     

      //validate email

      if(!filter_var($email, FILTER_VALIDATE_EMAIL))

        generate_response("error", $email_invalid);

      else //email is valid

      {

        //validate presence of name and message

        if(empty($name) || empty($message)){

          generate_response("error", $missing_content);

        }

        else //ready to go!

        {

          $sent = mail($to, $subject, $message, $headers);

          if($sent) generate_response("success", $message_sent); //message sent!

          else generate_response("error", $message_unsent); //message wasn't sent

        }

      }

    }

  }

  else if ($_POST['submitted']) generate_response("error", $missing_content);

 

?>

<?php while ( have_posts() ) : the_post(); ?>

 

       <?php get_template_part('templates/page', 'header'); ?>  <?php get_template_part('templates/content', 'page'); ?>
       
      

              <style type="text/css">
              
              main label span {display: inline-block !important; clear: none !important; margin-bottom: 0px !important;}

                .error{

                  padding: 5px 9px;

                  border: 1px solid red;

                  color: red;

                  border-radius: 3px;

                }

 

                .success{

                  padding: 5px 9px;

                  border: 1px solid green;

                  color: green;

                  border-radius: 3px;

                }

 

                form span{

                  color: red;

                }

              </style>

 

              <div id="respond">

                <?php echo $response; ?>

                <form action="<?php the_permalink(); ?>" method="post">

                  <p><label for="name">Name: <span>*</span> <br><input type="text" name="message_name" value="<?php echo $_POST['message_name']; ?>"></label></p>

                  <p><label for="message_email">Email: <span>*</span> <br><input type="text" name="message_email" value="<?php echo $_POST['message_email']; ?>"></label></p>

                  <p><label for="message_text">Message: <span>*</span> <br><textarea type="text" name="message_text"><?php echo $_POST['message_text']; ?></textarea></label></p>

                  <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>

                  <input type="hidden" name="submitted" value="1">

                  <p><input type="submit"></p>

                </form>

              </div>

  <p><strong>You can also contact the club on: <a href="mailto:<?php echo get_option('admin_email'); ?>"><?php echo get_option('admin_email'); ?></a>.</strong></p>


 

      <?php endwhile; // end of the loop. ?>
