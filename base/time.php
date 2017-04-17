<?php
  //> 时间戳
  echo time() . '<br/>';

  //> 设置默认的时区
  date_default_timezone_set('Asia/Shanghai');

  //> 日期 && 时间
  echo date('Y-m-d') . '<br/>';
  // strtotime('2014-04-29')相当于strtotime('2014-04-29 00:00:00')
  echo strtotime('2014-04-29') . '<br/>'; // 这个数字表示从1970年1月1日 00:00:00 到2014年4月29号经历了1398700800秒

  echo strtotime("now") . '<br/>'; // 相当于将英文单词now直接等于现在的日期和时间，并把这个日期时间转化为unix时间戳。这个效果跟echo time();一样。
  echo strtotime("+1 seconds") . '<br/>'; // 相当于将现在的日期和时间加上了1秒，并把这个日期时间转化为unix时间戳。这个效果跟echo time()+1;一样。
  echo strtotime("+1 day") . '<br/>'; // 相当于将现在的日期和时间加上了1天。
  echo strtotime("+1 week") . '<br/>'; // 相当于将现在的日期和时间加上了1周。
  echo strtotime("+1 week 3 days 7 hours 5 seconds") . '<br/>'; // 相当于将现在的日期和时间加上了1周3天7小时5秒。

  echo date('Y-m-d H:i:s', time()) . '<br/>'; // 输出为：2014-05-01 15:15:22 
  echo gmdate('Y-m-d H:i:s', time()) . '<br/>'; // 输出为：2014-05-01 07:15:22 因为格林威治时间是现在中国时区的时间减去8个小时，所以相对于现在时间要少8个小时

?>
