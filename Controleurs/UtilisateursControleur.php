<?php 

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Utilisateurs;

class UtilisateursControleur{
    public function liste(){
        $utilisateurs = Bdd::select("utilisateurs");
        affichage("utilisateurs/liste.html.php", ["utilisateurs" => $utilisateurs]);
    }
}

?>
