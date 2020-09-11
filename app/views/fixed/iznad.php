<div id="ceo">
    <?php if(isset($_SESSION['korisnik'])){?>
<div id="goreskroz">

<div id="zajedno">
<div id="skorisnika"><span id="zakori">Zdravo:<?= $_SESSION['korisnik']->ime;?></span></div>
<div id="okorisnika">

<span id="linkk"><a href='index.php?page=porudzbine'>Porudzbine| </a><a href='index.php?page=izmeni'> |Izmeni profil</a></li></span>
</div>
</div>
</div>
    <?php };?>