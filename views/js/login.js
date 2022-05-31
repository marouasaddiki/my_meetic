$(document).ready(function () {
  verif = { mail: false, password: false };

  $("#mail,#password").on("focusout", function () {
    if ($(this).val() == "") {
      id = $(this).attr("id");
      verif[id] = false;
      console.log(verif);
    } else {
      id = $(this).attr("id");
      verif[id] = true;
      console.log(verif);
    }
  });
  $("#connexion").on("click", function () {
    let test = true;
    $.each(verif, function (indexInArray, valueOfElement) {
      if (valueOfElement == false) {
        test = false;
      }
    });
    if (test == true) {
      $.ajax({
        type: "POST",
        url: "../controller/connexion.php",
        data: {
          user: $("#mail").val(),
          password: $("#password").val(),
        },
        success: function (data) {
          if (data == true) {
            window.location.href = "profil.php";
          } else if ((data = "disabled")) {
            $("#information")
              .css("height", "50px")
              .text("Votre compte a été desactivé")
              .show(500)
              .delay(3000)
              .hide(500);
          } else {
            $("#information")
              .css("height", "50px")
              .text(data)
              .show(500)
              .delay(3000)
              .hide(500);
          }
        },
      });
    } else {
      alert("un ou plusieur champs sont incorrect");
    }
  });
});
