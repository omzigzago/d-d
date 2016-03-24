<?php
$page_size=10;
$s_rec;//ta requete
$_SESSION["p"]=isset($_GET["p"]) ?($_GET["p"]):1;
$pager=pagerClass::getPager($s_rec["s_count"],$_SESSION["p"],0,$page_size);
?>
<table border="0" cellpadding="0" width="100%" align="center" cellspacing="0" height="100%">
    <tr>
            <td align="center" valign="bottom" width="10%"><a href='javascript:void(0)' onClick="JavaScript:ajaxWithAllow('<?php echo $name_td ?>','<?php echo $list_link ?>?p=1','give_allow_hidden',0);" id="menu_back_back" class = "menu_button_back"></a></td>
            <td align="right" valign="bottom" width="10%"><?php if(isset($pager["prev_page"])){?><a href='javascript:void(0)' onClick="JavaScript:ajaxWithAllow('<?php echo $name_td ?>','<?php echo $list_link ?>?p=<?php echo $pager["prev_page"];?>','give_allow_hidden',0);" id="menu_back" class = "menu_button_back"></a><?php } ?></td>
            <td align="center" width="60%" id="td_list_pages">
                    <table cellspacing="3" cellpadding="1" border="0" id="tb_list_pages">
                          <tr>
                          <?php
                            for($i=$pager["first_page_link"];$i<=$pager["last_page_link"];$i++)
                            {
                              echo "<td width='10px' valign='middle'><a href='javascript:void(0)' onClick=\"JavaScript:ajaxWithAllow('$name_td','".$list_link."?p=".$i."','give_allow_hidden',0);\">".($i==$_SESSION["p"]?("<font color='#FF9933' size='5'>".$i."</font>"):("<font size='2'>".$i."</font>"))."</a></td>";
                            }
                          ?>
                          </tr>
                    </table>
            </td>
            <td align="center" valign="bottom" width="10%"><?php if(isset($pager["next_page"])){?><a href='javascript:void(0)' onClick="JavaScript:ajaxWithAllow('<?php echo $name_td ?>','<?php echo $list_link ?>?p=<?php echo $pager["next_page"];?>','give_allow_hidden',0);" id="menu_next" class = "menu_button_next"></a><?php } ?></td>
            <td align="center" valign="bottom" width="10%"><a href='javascript:void(0)' onClick="JavaScript:ajaxWithAllow('<?php echo $name_td ?>','<?php echo $list_link ?>?p=<?php echo $pager["last_page"];?>','give_allow_hidden',0);" id="menu_next_next" class = "menu_button_next"></a></td>
    </tr>
</table>
