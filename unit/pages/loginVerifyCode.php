<?php
  require_once '../config.php';
  require_once ROOTPATH . '/utils/image/verifyCode.php';
  securityCoder::$useNoise = false;
  securityCoder::$useCurve = true; 
  securityCoder::$fontSize = 18; 
  securityCoder::entry();
?>