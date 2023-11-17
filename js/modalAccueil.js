let myModal = document.getElementById('myModal');
let test = document.getElementById('test');
let timeoutId ="";
let cookie_name = GetCookie("OK");

let verif=false;

if (  cookie_name !== null && cookie_name !== undefined){

    verif = true;
    //verif=false;

} else {

    verif = false;
   
}
 window.addEventListener('load', function(){

    if(!verif){

        let alertId = window.setTimeout(

        function(){$('#myModal').modal('show');},4000);

          OK = "OK";

          duree = 3;  // Durée de vie du cookie en jours
          date_expire = new Date();
          date_expire.setTime(date_expire.getTime() + (duree*24*60*60*1000));

          SetCookie("OK",OK,date_expire);
        
    }

});
/*window.addEventListener('load', function(){
    let alertId = window.setTimeout(
    function(){$('#myModal').modal('show');//myModal.show();
    },
    4000);*/
/*function adModal(){
}
timeoutId = window.setTimeout(adModal ,4000);*/

/*
  nom_var = GetCookie("nom");
    if (nom_var == null) {
      nom_var = prompt("Quel est votre nom ?","");
      duree = 10;  // Durée de vie du cookie en jours
      date_expire = new Date();
      date_expire.setTime(date_expire.getTime() + (duree*24*60*60*1000));
      SetCookie("nom",nom_var,date_expire);
    }
    document.writeln("<H2 ALIGN=center>Hello " + nom_var + "</H2>");*/
