
<?php
// Osnovna podesavanja
define("ABSOLUTE_PATH", $_SERVER["DOCUMENT_ROOT"]."/PHP2-Prvi sajt/sajtPHP21/SajtPHP2s1/Obaranje");
// Ostala podesavanja
define("ENV_FAJL", ABSOLUTE_PATH."/app/Config/.env");
define("LOG_FAJL", ABSOLUTE_PATH."/app/data/log.txt");
define("ADRESAR", ABSOLUTE_PATH."/app/data/adresar.txt");
define("GRESKE", ABSOLUTE_PATH."/app/data/greske.txt");
define("PROBA",  ABSOLUTE_PATH."/app/data/proba.txt");

define("SEPARTOR", "&");

define("SERVER", env("SERVER"));
define("DATABASE", env("DATABASE"));
define("USERNAME", env("USERNAME"));
define("PASSWORD", env("PASSWORD"));
function env($naziv){
    $podaci = file(ENV_FAJL);
    $vrednost = "";
    foreach($podaci as $key=>$value){
        $konfig = explode("=", $value);
        if($konfig[0]==$naziv){
            $vrednost = trim($konfig[1]); 
        }
    }
    return $vrednost;
}
?>