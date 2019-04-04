<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Concours fini !</h1>
            <p> Désoler, le concour est fini !</p>
        </div>
    </div>
</div>
<?php 
$content = ob_get_clean();
require('base.php');