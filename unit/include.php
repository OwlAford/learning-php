<?php 
  header("content-type:text/html;charset=utf-8");
  date_default_timezone_set("PRC");
  define("ROOT",dirname(__FILE__));
  set_include_path(".".PATH_SEPARATOR.ROOT."/utils/image".PATH_SEPARATOR.ROOT."/utils/string".PATH_SEPARATOR.get_include_path());
  require_once 'verifyImage.php';

?>
