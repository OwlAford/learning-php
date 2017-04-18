<?php
  /**
   * 得到文件的扩展名
   * @param string $filename
   * @return string
   */
  function getExt($filename) {
    return strtolower(end(explode('.', $filename)));
  }
?>