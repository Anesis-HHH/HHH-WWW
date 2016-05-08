<meta http-equiv="refresh" content="0;url=../comnews.php" />
<?php
include dirname(__FILE__).'/../../include/connexionBdd.php';


if(isset($_GET['idcommnews']))
{
$del = $bdd->query('DELETE FROM commentaire_news WHERE id = '. $_GET['idcommnews']);
echo "commentaire supprimé";
}
?>
