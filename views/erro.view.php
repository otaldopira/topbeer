<?php
require('layout/header.php'); 
if(isset($_SESSION['erro'])){
    //var_dump($_SESSION['erroPar']);
    if($_SESSION['erro']['count'] === 0){
        $msn = $_SESSION['erro']['msn'];
        $_SESSION['erro']['count']++;
    } else {
       unset($_SESSION['erro']);
    }
}

if(isset($_SESSION['sucesso'])){
    if($_SESSION['sucesso']['count'] === 0){
        $msn = $_SESSION['sucesso']['msn'];
        $_SESSION['sucesso']['count']++;
    } else {
       unset($_SESSION['sucesso']);
    }
}
?>
<div class="sucesso">
    <div class="video-success">
        <img class="checkmark" src="/images/red-error-icon.svg" alt="x" style="stroke: blue; box-shadow:  inset 0px 0px 0px red; box-shadow: inset 0px 0px 0px 130px red !important;">
    </div>
    <h2>Compra Rejeitada !</h2>
    <p><?php if(isset($msn)) echo $msn ?></p>
</div>
<?php require('layout/footer.php'); ?>