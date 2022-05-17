<?php
require_once("model/General.php");
$general=new General();
?>
<!doctype html>
<html>
<head>
  <link rel="icon" href="favicon.ico" type="image/ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="resources/css/uikit.min.css" />
  <link rel="stylesheet" href="resources/css/estilo-login.css" />
  <script src="resources/js/jquery-3.6.0.min.js"></script>
  <script src="resources/js/uikit.min.js"></script>
  <script src="resources/js/uikit-icons.min.js"></script>
  <title>SESI v.01</title>
</head>

<body>
    <div class="uk-section uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport="uk-height-viewport">
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid="uk-grid">
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large uk-text-center">
                            <img src="resources/images/logo_blue.png" class="uk-margin-bottom" height="200">
                            <form method="post" action="procesar.php">
                            	
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                                        <input class="uk-input" type="text" name="txt_login">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input class="uk-input" type="password" name="txt_password">	
                                    </div>
                                </div>
                                
                                <div class="uk-margin">
                                    <button class="uk-button uk-button-primary uk-button-large uk-width-1-1">Iniciar Sesión</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>