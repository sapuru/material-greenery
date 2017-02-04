<?php

if(isset($_POST['email'])) {

    $email_to = "aymara.sapuru@gmail.com";

    $email_subject = "Formulario de contacto sapuru";


    function died($error) {

        // your error code can go here

        echo "Hubo un error con el formulario enviado ";

        echo "Los errores son los siguientes:<br /><br />";

        echo $error."<br /><br />";

        echo "Por favor intentalo de nuevo.<br /><br />";

        die();

    }



    // validation expected data exists

    if(!isset($_POST['name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['message'])) {

        died('Aparentemente hay un error con el formulario enviado.');

    }


    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $email_message = "Detalles abajo.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Name: ".clean_string($name)."\n";

    $email_message .= "Email: ".clean_string($email)."\n";

    $email_message .= "Message: ".clean_string($message)."\n";


	// create email headers

	$headers = 'From: '.$email."\r\n".

	'Reply-To: '.$email."\r\n" .

	'X-Mailer: PHP/' . phpversion();

	@mail($email_to, $email_subject, $email_message, $headers);


?>



<!-- include your own success html here -->

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Sapuru</title>

  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet">
  <link href="css/style.css" type="text/css" rel="stylesheet" >
  <script src="js/modernizr.js"></script> <!-- Modernizr -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body id="top" class="scrollspy">
<section>
  <div class="container">
      <!--   Icon Section   -->
    <div class="row">
          <div  class="col s12 m12 l12">
            <div class="valign-wrapper">
            <h2 class="center header text_h2 valign"> ¡Gracias! Contestaré a la brevedad.</h2>
            <h3 class="center header text_h3 valign"><a href="http://sapuru.com.ar">Volver al Inicio</a></h3>
          </div>
          </div>
    </div>
 </div>
</section>
</body>
</html>


<?php

}

?>
