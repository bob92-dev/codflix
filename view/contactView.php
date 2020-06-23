<?php ob_start();
var_dump($_POST);

?>
<div class="container">
    <div class="starter-template">
        <form action="" method="post">
             <div class="row">
                 <div class="col-xs-6">
                     <div class="form-group">
                        <label for="inputname">Votre nom</label>
                        <input type="text" name="name" class="form-control" id="inputname">
                    </div>
                 </div>
                 <div class="col-xs-6">
                     <div class="form-group">
                         <label for="inputemail">Votre email</label>
                         <input type="email" name="email" class="form-control" id="inputemail">
                     </div>
                 </div>
                 <div class="col-xs-12">
                     <div class="form-group">
                        <label for="inputmessage"></label>
                         <textarea name="message" id="inputmessage" cols="30" rows="10" class="form-control"></textarea>
                     </div>
                   <button type="submit" class="btn btn-primary">Envoyer</button>
                 </div>   

            </div>
        </form>
    </div>
</div>

<?php
// MOI : ob-get-clean récupére les données mises en tempaons et
$content = ob_get_clean();
require ('base.php');
?>