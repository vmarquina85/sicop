<?php
include ('../class/menu/menu_cls.php');
$menu= new menu();

session_start();
$usrreg=$_SESSION['sicop_usr_id'];
$rs_menu=$menu->get_menu($usrreg);
for ($m=0; $m <  sizeof($rs_menu); $m++) {
  echo"<li class='has-sub'>
      <a href='javascript:;'>
        <b class='caret pull-right'></b>
        <img src='".$rs_menu[$m]['menu_icon']."'>
        <span>".$rs_menu[$m]['menu_name']."</span>
      </a>
      <ul class='sub-menu'>";
      $submenu= new menu();
      $rs_submenu=$submenu->get_submenus($usrreg,trim($rs_menu[$m]['menu_id']));
          for ($s=0; $s < sizeof($rs_submenu) ; $s++) {
  echo "<li><a href='".$rs_submenu[$s]['submenu_link']."'>".$rs_submenu[$s]['submenu_name']."</a></li>";
      }
  echo "</ul></li>";
}
echo "<li class='menu-control menu-control-left'>
    <a href='#' data-click='prev-menu'><i class='material-icons'>arrow_back</i></a>
  </li>
  <li class='menu-control menu-control-right'>
    <a href='#' data-click='next-menu'><i class='material-icons'>arrow_forward</i></a>
  </li>
</ul>";
 ?>
