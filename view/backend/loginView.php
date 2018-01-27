<p>Veuillez entrer le login et le mot de passe pour accéder à l'administration du blog</p>
        <form action="index.php?action=adminConnect" method="post">
            <p>
            <input type="text" name="login" />
            <input type="password" name="mot_de_passe" />
            <input type="submit" value="Valider" />
            </p>
        </form>
<?php
if (isset($erreurMdp)AND($erreurMdp != '')){
    echo $erreurMdp;
}
?>