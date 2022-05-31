$(document).ready(function(){

    verif = {"genre":false,"nom":false,"prenom":false,"date":false,"ville":false,"email":false,
    "motdepasse":false,"motdepasseverif":false,"loisir":false};

    $('#genre,#nom,#prenom,#ville,#email,#motdepasse,#motdepasseverif,#loisir')
    .on("focusout",function(){

        if($(this).val() == "" && $(this).parent().children("#info").last().length == 0)
        {
            idverif = $(this).attr("id")
            $(this).css("border",'2px solid red')
            $(this).parent().append("<div id='info'></div>")
            $(this).parent().children("#info").text('Le champs ne peut etre vide')
            verif[idverif] = false
        }
        if($(this).val() == "" && $(this).parent().children("#info").last().length == 1){
            
        }
        else
        {
            idverif = $(this).attr("id")
            $(this).css("border","")
            $(this).parent().children("#info").remove()
            verif[idverif] = true
        }
    })
    $('#date').on("focusout",function(){
        let dateSaisie = new Date($('#date').val())
        let dateAujourdhui = new Date($.now())
        let resultat = dateAujourdhui - dateSaisie
        if(resultat > 567648000000)
        {
            idverif = $(this).attr("id")
            $(this).parent().children("#info").remove()
            $(this).css("border",'')
            verif[idverif] = true
        }
        else
        {
            idverif = $(this).attr("id")
            verif[idverif] = false
            $(this).css("border",'2px solid red')
            $(this).parent().append("<div id='info'></div>")
            $(this).parent().children("#info").text('Vous avez moins de 18 ans')
        }
    })

    $('#motdepasseverif').on("focusout",function(){
        val1 = $('#motdepasse').val()
        val2 = $('#motdepasseverif').val()
        if(val1 == val2)
        {
            verif["motdepasseverif"] = true
            $(this).parent().children("#info").remove()
            $(this).css("border",'')
        }
        else
        {
            $(this).css("border",'2px solid red')
            $(this).parent().append("<div id='info'></div>")
            $(this).parent().children("#info").text('Le mot de passe ne correspond pas')
        }
    })

    $('#email').on('focusout',function(){
        var pattern = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
        emailValue = $('#email').val()
        test = pattern.test(emailValue)
        if(test == true)
        {
            $(this).parent().children("#info").remove()
            $(this).css("border",'')
            verif["email"] = true;
        }
        else
        {            
            $(this).css("border",'2px solid red')
            if(!$('#info'))
            {
                $(this).parent().append("<div id='info'></div>")
                $(this).parent().children("#info").text('e-mail incorrect')
            }
            verif["email"] = false;
        }
    })

    $('#valider').on("click",function(){
       let test = true
        $.each(verif, function (indexInArray, valueOfElement) { 
             if(valueOfElement == false)
             {
                 test = false
             }
        });
        if(test == true){
            $.ajax({
                type: "POST",
                url: "controller/inscription.php",
                data: {
                    genre:$('#genre').val(),
                    nom:$('#nom').val(),
                    prenom:$('#prenom').val(),
                    date:$('#date').val(),
                    ville:$('#ville').val(),
                    email:$('#email').val(),
                    motdepasse:$('#motdepasse').val(),
                    motdepasseverif:$('#motdepasseverif').val(),
                    loisir:$('#loisir').val(),
                },
                success: function(data){
                    if(data == true)
                    {
                        $('.information').css('height','50px').show(500).text("Inscription reussi ! Redirection...")
                        setTimeout(function(){ window.location.href = 'views/login.php'; }, 3000);
                    }
                    else
                    {
                        $('.information').css('height','50px').show(500).text("Vous avez deja un compte sur notre site !")
                       
                    }
                },
                
              });
        }
        else{
            alert('un ou plusieur champs sont incorrect')
        }
    })
})