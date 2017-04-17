<?php
  //> 绘制图片
  header("content-type: image/png");
  $img = imagecreatetruecolor(100, 100); // 创建一个真彩色的空白图片
  $red = imagecolorallocate($img, 0xFF, 0x00, 0x00); // 进行分配画笔颜色
  imageline($img, 0, 0, 100, 100, $red); // 在这里使用imageline绘制线条
  imagestring($img, 5, 0, 0, "Hello world", $red); // 绘制文字
  imagefill($img, 0, 0, $red); // 进行线条的绘制，通过指定起点跟终点来最终得到线条
  imagepng($img, 'img/code.png'); // 得到一个图片文件，指定文件名将绘制后的图像保存到文件中
  imagejpeg($img, 'img/code.jpg'); // 得到一个图片文件，指定文件名将绘制后的图像保存到文件中
  imagedestroy($img); // 销毁图片

  //> 生成验证码
  $img = imagecreatetruecolor(100, 40);
  $black = imagecolorallocate($img, 0x00, 0x00, 0x00);
  $green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
  $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
  imagefill($img, 0, 0, $white);
  //生成随机的验证码
  $code = '';
  for($i = 0; $i < 4; $i++) {
    // $code .= rand(0, 9); // 数字
    $code .= dechex(rand(0, 15));
  }
  imagestring($img, 5, 10, 10, $code, $black);
  //加入噪点干扰
  for($i=0; $i<50; $i++) {
    imagesetpixel($img, rand(0, 100) , rand(0, 100) , $black); 
    imagesetpixel($img, rand(0, 100) , rand(0, 100) , $green);
  }
  //输出验证码
  header("content-type: image/png");
  imagepng($img);
  imagedestroy($img);

  //> 给图片添加水印
  $url = 'http://www.iyi8.com/uploadfile/2014/0521/20140521105216901.jpg';
  $content = file_get_contents($url);
  $filename = 'img/tmp.jpg';
  file_put_contents($filename, $content);
  $url = 'http://wiki.ubuntu.org.cn/images/3/3b/Qref_Edubuntu_Logo.png';
  file_put_contents('img/logo.png', file_get_contents($url));
  //开始添加水印操作
  $im = imagecreatefromjpeg($filename);
  $logo = imagecreatefrompng('img/logo.png');
  $size = getimagesize('img/logo.png');
  imagecopy($im, $logo, 15, 15, 0, 0, $size[0], $size[1]); 
   
  header("content-type: image/jpeg");
  imagejpeg($im, 'img/addlogo.jpg');
?>
