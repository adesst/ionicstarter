function onSuccess(){
    navigator.notification.alert("Successfully launched navigator");
}

function onError(errMsg){
    navigator.notification.alert("Error launching navigator: "+errMsg);
}


function navigate(e){
    e.preventDefault();
console.log("Hey i am running...");
    var dest = $('#dest input').val(),
        start = $('#start input').val();
    var dest = "51.498739, -0.133827",
        start = "53.493002,-2.240080";
    if(!dest){
        navigator.notification. alert("A destination must be specified");
        return;
    }

console.log("Start is ... " + start );
    launchnavigator.navigate(dest, {
        start: start,
        enableDebug: true
    });
    return false;
}

function init() {
    $('#form').submit(navigate);

    $("body").on("click",".changetitle", function(){
      console.log("Title change");

      //document.getElementsByClassName("title")[0].innerHTML("Hey");
      $("#bar-title").html("hey");

      console.log("Title changed");
      //$("#form-login").toggleClass("hide");
      //$("#login").toggleClass("hide");
      angular.element("#Starter").scope().openLogin("user");
    });
    console.log("Hey i am inited123...");
}


$(document).on("ready", init);




