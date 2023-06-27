<?php
require "./config.php";
var_dump($_POST);
var_dump($_COOKIE);
if(isset($_POST["credential"]))
{
  if(empty($_COOKIE["g_csrf_token"]) || empty($_POST["g_csrf_token"]) || $_COOKIE["g_csrf_token"]!= $_POST["g_csrf_token"])
  {
     echo "Erreur vérification du jeton g_csrf_token";
     exit();
  }
// Get $id_token via HTTPS POST.
$clientId = "233837293674-1onn43vrls7hqsg9phqn3anhit247cf6.apps.googleusercontent.com";
$client = new Google_Client(['client_id' => $clientId]);  // Specify the CLIENT_ID of the app that accesses the backend
$idToken = $_POST["credential"];
$payload = $client->verifyIdToken($idToken);
var_dump($payload);
if ($payload) {
  $userid = $payload['sub'];
  // If request specified a G Suite domain:
  //$domain = $payload['hd'];
} else {
  // Invalid ID token
}
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Connexion </h1>
  <div id="g_id_onload"
     data-client_id="233837293674-1onn43vrls7hqsg9phqn3anhit247cf6.apps.googleusercontent.com"
     data-context="signin"
     data-ux_mode="popup"
     data-login_uri="http://localhost:3030/login.php"
     data-auto_prompt="false">
</div>

<div class="g_id_signin"
     data-type="standard"
     data-shape="rectangular"
     data-theme="filled_black"
     data-text="signin_with"
     data-size="large"
     data-logo_alignment="left">
</div>
  <script src="https://accounts.google.com/gsi/client" async defer></script>
</body>
</html>