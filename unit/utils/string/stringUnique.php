<?php
  /**
   * 生成唯一字符串
   * @return string
   */
  function stringUnique() {
    return md5(uniqid(microtime(true), true));
  }
?>