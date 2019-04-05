<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="box col-lg-12 text-center">
            <h1 class="mt-5">Concours Zec</h1>
            <form action="/zec/public/" method="post">
                <?= $question[0] ?> (réponse : test1):<br>
                <input id="inputField1" type="text" name="rep1"><div id="inputCheck1"><?= $inputCheck[1] ?></div><br>
                <?= $question[1] ?> (réponse : test2):<br>
                <input id="inputField2" type="text" name="rep2"><div id="inputCheck2"><?= $inputCheck[2] ?></div><br>
                <?= $question[2] ?> (réponse : test3):<br>
                <input id="inputField3" type="text" name="rep3"><div id="inputCheck3"><?= $inputCheck[3] ?></div><br>
                <?= $question[3] ?> (réponse : test4):<br>
                <input id="inputField4" type="text" name="rep4"><div id="inputCheck4"><?= $inputCheck[4] ?></div><br>
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</div>
<?php 
$content = ob_get_clean();
require('Base.php');