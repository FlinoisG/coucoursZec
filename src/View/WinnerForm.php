<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="box col-lg-12 text-center">
            <h1 class="mt-5">Bravo !</h1>
            <form name="form" action="/zec/public/?p=winner&password=<?= $password ?>" onsubmit="return validateForm()" method="post">
                Nom :<br>
                <input type="text" name="lastName" maxlength="40" autofocus required /><br>
                Prénom :<br>
                <input type="text" name="firstName" maxlength="40" required /><br>
                Email :<br>
                <input id="email" type="text" name="email" maxlength="255" required /><br>
                Vérification email :<br>
                <input id="emailCheck" type="text"><br>
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</div>
<script>
var email = document.getElementById("email");

function validateForm() {
  var lastName = document.forms["form"]["lastName"].value;
  if (lastName == "") {
    alert("Name must be filled out");
    return false;
  }
}
</script>
<?php 
$content = ob_get_clean();
require('Base.php');