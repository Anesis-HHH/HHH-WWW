<meta http-equiv="refresh" content="0;url=../comnews.php" />
<?php
include dirname(__FILE__).'/../../include/connexionBdd.php';


if(isset($_GET['idcommprojet']))
{
$del = $bdd->query('DELETE FROM commentaire_news WHERE id = '. $_GET['idcommprojet']);
echo "commentaire supprimé";
}
?>
