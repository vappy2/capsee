$(document).ready(function(){
    //instancie la variable login qui fait appelle à notre forme dans index.php
    var login = $('#login');

    //on id les alerte
    var alert_content=$('.alert_content');
    login.on('submit',function(e){
    e.preventDefault();
    //l'ajax qui permet de faire notre message d'alerte
    $.ajax({
      //on appelle notre controller
      url :'login.php',
      //le type d'information de notre formulaire
      type :'POST',
      //Notre type d'info recupérer
      dataType:'html',

      data : login.serialize(),
      //on s'accope maintenant de notre réponse
      beforeSend : function(){
        alert_content.fadeOut();
        alert_content.fadeIn();
        alert_content.html('Loading ...');
      },
      //Dans le cas où le das + mot de passe ont bien été envoyé
      success: function(data) {
        alert_content.html(data).fadeIn();
        if (data=="") {
        login.trigger('reset');
        window.location.href = "view/accueil.php"; //Redirection vers une autre page
        }
      },
      error: function(e) {
        console.log(e)
      }
    });
  });
});
