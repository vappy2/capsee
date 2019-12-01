<?php
require_once('model/loginClass.php');
require_once($path.'header.php');
?>

<script type='text/javascript' src="loginaj.js"></script>


<body>
    <!--formulaire-->
    <div class="container" id="login_form">

		<form class="form-horizontal block-center" role="form" id="login" action="" method="POST">

      <div>

        <h2 class="text-center"> Connexion </h2>

        <div class="input-group" style="margin:auto"></br>
          <label class="col-xs-2 control-label"><img src="#"></label>
          <div class="col-xs-10">
			       <input type="pseudo" class="form-control" name="Pseudo" placeholder="Pseudo" id="inputpseudo" />
           </div>
         </div>

           <div class="input-group" style="margin:auto"></br>
             <label class="col-xs-2 control-label"><img src="img/cadenas.png"></label>
             <div class="col-sm-10">
               <input type="password" class="form-control" name="password" placeholder="Mot de passe" id="inputpass" />
             </div>
           </div>

           <div class="text-center">
           </br>
			</a>
          </br>
          </br>

          <div class="col-xs-12 text-center">
			     <input type="submit" class="btn btn-muted btn-lg" style="margin:auto;" value="Valider"/></br></br>
			<!-- This is the div where AJAX will send the response -->
			       <div class="alert_content"></div>
           </div>
		</form>

	</div>

</body>
</html>
