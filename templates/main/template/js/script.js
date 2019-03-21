$(function(){
    setFoto();
    controllaUserPass();
    checkUsername();
    checkEmail();
    checkRipetiPass();
    ricercaVeloce();
    i=2;
    utentiReg();
});

function vediSchede(user){
    var testo= $('#testo');
    $('#'+user+'').bind('click', function(){
        $.ajax({
            type: "POST",
            url: "index.php?controller=utente&task=schede",
            data: {username:user},
            dataType: "json",
            success: function(data){
                testo.empty();
                for (j=0; j<data.length; j++){
                    testo.append('<span>'+data[j].nome_artista+data[j].data+data[j].stato+data[j].stato_pubblicazione+'</span><br>');
                }
                $("#overlay").fadeIn('fast');
                testo.show();
            }
        });
        //$("#overlay").fadeIn('fast');
        //testo.show();
        
    });
    $("#chiudi").click(function(){
        $("#overlay").fadeOut('fast');
        testo.hide();
        });
}

function utentiReg(){
    var mostrautenti=$('#mostrautenti');
    mostrautenti.bind('click',function(){
        if (i==2){
        $.ajax({
            type: "POST",
            url: "index.php?controller=utente&task=lista",
            dataType: "json",
            success: function(data){
                var j=1;
                for(k=0; k<data.length; k++){
                    if (data[k].username && data[k].nome && data[k].cognome && data[k].email){
                        $('#tbody').append('<tr><td>'+j+'</td><td id="'+data[k].username+'" class="utente"><a>'+data[k].username+'</a></td><td>'+data[k].nome+'</td><td>'+data[k].cognome+'</td><td>'+data[k].email+'</td></tr>');
                        j++;
                    vediSchede(data[k].username);
                    }
                }
                i--;
            }
        });
        }
        else{
            if(i==1){
            $('#tbody').hide();
            i--;}
            else{
                $('#tbody').show();
                i++;
            }
        }
    });
}
/*
 *function utentiReg(){
    var mostrautenti=$('#mostrautenti');
    mostrautenti.bind('click',function(){
        $.ajax({
            type: "POST",
            url: "index.php?controller=utente&task=lista",
            success: function(data){
                $("#tbody").toggle("slow", function(){
                    $("#tbody").html(data);
                });
                
                //$("#tbody").fadeIn('slow', function(){
                   // html(data);
            }
        });
    });
}
 **/
                
                //$("#tbody").fadeIn('slow', function(){
                   // html(data);

function ricercaVeloce(){
    $("#nome_artista").keyup(function(){
        var nome=$("#nome_artista").val();
        $.ajax({ type: "POST",
        url: "index.php?controller=artista&task=veloce",
        data: {data:nome},
        dataType: "json",
        success:function(data){
            var nomi=data;
            $("#nome_artista").autocomplete({
               source: nomi
            });
            }
        });
        });    
}

function checkRipetiPass(){
    $("#ripetipassword").keyup(function(){
        var password=$("#password").val();
        var rippassword=this.value;
        if(rippassword==password)
            $("#check_password").html('Ok, password corrispondenti').css('color','green');
        else
            $("#check_password").html('Attenzione! Password non corrispondenti').css('color','red');
    });
}

function checkEmail(stato){
    $("#email").keyup(function(){
        var email=this.value;
        var regex =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/;
        if(!regex.test(email)){
            $("#check_email").html('Email non valida').css('color','red');
            }
        else{
            $("#check_email").html('Email valida').css('color','green');
                }
        });
    return stato;
}

function checkUsername(){
    $("#username").keyup(function(){
        var username = this.id;
        $.ajax({ type: "POST",
        url: "index.php?controller=registrazione&task=verificaUser",
        data: username+"="+this.value,
        success: function(response){
 
            if(response=='disponibile'){
                $("#check_username").html('Disponibile').css('color','green');
            } else{
                $("#check_username").html('Non disponibile').css('color','red');
                }
        }
        });
    });    
}

function setFoto(){
    $('#slide').css('height','400').css('width','500');
    $('#foto1').css('height','400').css('width','500');
    setInterval(slideFoto,2500);
    immagini = new Array('templates/main/template/img/logo.jpg','https://cdn-images-1.medium.com/max/1600/1*ot7tWiPCYC01pV0kGmK3qQ.png','templates/main/template/img/youtube-per-la-musica.jpg');
    index = 1;
}

function slideFoto(){
    $('.img-responsive').fadeOut('slow', function () {
      $(this).attr('src', immagini[index]);
      $(this).fadeIn('slow', function () {
        if (index == immagini.length - 1) {
          index = 0;
        } else {
          index++;
        }
      });
    });
}


function controllaUserPass(){
    var tastologin=$('#tastologin');
    tastologin.bind('click',function(){
        var user=$('#username').val();
        var pass=$('#password').val();
      if((user=='') || (user=='undefined' || (pass=='') || (pass=='undefined'))){
        $("#messaggio").html('Username e password sono necesarie').css('color','red');
        tastologin.attr('type','button');
      }
      else
        tastologin.attr('type','submit');
    });
}


