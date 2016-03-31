
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MyLog</title>
</head>

<body bgcolor="#000000">
 			<div style="color:#CCC;width:400px;height:60px;text-align:center;padding-top:10px;">
            <div style="float:left;width:200px;height:40px">
                <input type="button" value="REFRESH" onClick="document.location.href='<?php echo $_SERVER["REQUEST_URI"]?>'" style="width:120px;cursor:pointer;box-shadow:3px 3px #666"/>
            </div>
            <div style="float:left;width:200px">
                <input type="button" value="CLEAR" onClick="document.location.href='<?php echo $_SERVER["REQUEST_URI"]?>?action=clear'" style="width:120px;cursor:pointer;box-shadow:3px 3px #666"/>
            </div>
      </div>
<?php
$cheminVersLog='C:\Program Files (x86)\PostgreSQL\EnterpriseDB-ApachePHP\apache\logs\error.log';//remplace ceci par le chemin vers le log de ton serveur
$nomDeCeFihier='http://localhost:8080/cheminVersCeFichier/logFile.php'
if(isset($_GET['action']) && $_GET['action']=='clear')
{
			fopen($cheminVersLog, 'w'); // ouvre le fichier et réduit sa taille à zéro
			?>
      <script type="text/javascript">
						document.location.href='<?php echo $nomDeCeFihier?>';
			</script>
      <?php
}
else
{
	?>
      <div style="">
            <table>
            <?php
            
                  ini_set('memory_limit', '-1');
                  $lines = file($cheminVersLog);
                  $i=count($lines)>100?count($lines)-50:0;
                  for($lineNumber=$i;$lineNumber<count($lines);$lineNumber++)
                  {
                     $lineContent=str_replace(array("] [","[:error]",": ","]"),array("]&nbsp;&nbsp;&nbsp;[","[error]",":&nbsp;&nbsp;&nbsp;","]&nbsp;&nbsp;"),$lines[$lineNumber]);
                  ?>
                   <tr><td nowrap="nowrap" style="color:#FFF;font-size:11px;font-family:Arial, Verdana"><?php echo $lineContent?></td></tr>
                  <?php
                  }
                  ?>
            </table>
      </div>
<?php
}
?>
</body>
</html>
