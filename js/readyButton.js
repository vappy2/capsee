$(function(){
    $("#readyButton").click(function(){
        $("#readyButton").css('display','none');
        $("#envoiButton").css('display','block');
        $("#recevoirButton").css('display','block');
    });

    $("#recevoirButton").click(function(){
        $("#msgIntention").css('display','none');
        $("section.col-sm-3").css('display','block');
    });
});