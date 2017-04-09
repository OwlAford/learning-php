<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP 基础学习</title>
</head>
<body>
  
<?php
  //> 开始学习php
  $start = '开始学习php！';
  var_dump($start);
  echo $start;

  //> 布尔值
  $flag = false;
  var_dump($flag);

  //> 浮点数
  $floatNum = 7.0E-10;
  // 禁止显示php警告提示
  // error_reporting(0);
  var_dump($floatNum);
  // 释放变量
  unset($floatNum);
  var_dump($floatNum);

  //> 读取文本
  $file = fopen('../sample.txt', 'r');
  if ($file) {
    // 判断是否到最后一行
    while (!feof($file)) { 
      // 读取一行文本
      $line = fgets($file); 
      echo $line;
      echo "<br />";
    }
  }
  // 关闭文件
  fclose($file);

  //> 常量
  define('pi', 3.14);
  $radius = 1.2;
  echo pi . '<br/>';
  echo '面积为：' . ($radius * $radius * pi) . '<br/>';
  echo '周长为：' . (2 * $radius * constant('pi')) . '<br/>';
  // 判断变量是否被定义
  echo var_dump(defined('pi'));
  echo var_dump(defined('pi2'));

  //> 系统常量
  echo __FILE__ . '<br/>';
  echo __LINE__ . '<br/>';
  echo PHP_VERSION . '<br/>';
  echo PHP_OS . '<br/>';

  //> 异或
  $varA = false;
  $varB = true;
  $varC = false;
  echo ($varA xor $varB xor $varC) ? '异或真<br/>' : '异或假<br/>';

  //> php中的错误控制运算符
  $conn = @mysql_connect('localhost', 'username', 'password');
  echo '出错了，错误原因是：' . $php_errormsg . '<br/>';

  //> 运算符运用
  $maxCol = 4;
  $num = 17;
  $modulus = $num % $maxCol;
  echo '该生被安排在' . ceil($num / $maxCol) . '排' . ($modulus ? $modulus : $maxCol) . '列<br/>';

  //> Array && foreach
  $students = array(
    '2010' => array('绝招' => '独孤九剑', '名号' => '令狐冲'),
    '2011' => '林平之',
    '2012' => '曲洋',
    '2013' => '任盈盈',
    '2014' => '向问天',
    '2015' => '任我行',
    '2016' => '冲虚',
    '2017' => '方正',
    'gay' => '岳不群',
    '2019' => '宁中则'
  );
  foreach ($students as $k => $v) {
    if (count($v) > 1) {
      echo $k . ':' . '</br>';
      foreach ($v as $k2 => $v2) {
        echo '<em>' . $k2 . ':' . $v2 . '</br></em>';
      }
    } else {
      echo $k . ':' . $v . '</br>';
    }
  };

  // 检测变量是否设置
  if (isset($students)) {
    echo(count($students));
    print_r($students);
    print_r($students[2012]);
    print_r($students['gay']);
  };

  //> 函数
  function animal () {
    return array('鸡', '鸭', '鹅', '猪', '牛', '羊');
  }
  list($a, $b, $c, $d, $e, $f) = animal();
  echo '<br/>我家有：' . $a . '、' . $b . '、' . $c . '、' . $d . '、' . $e . '、' . $f;

  // 可变函数
  $fnName = 'animal';
  print_r($fnName());

  $str = 'php是世界上最好的语言！';
  $str = str_replace('php', 'java', $str);
  echo $str;

  //> 判断function、class、文件是否存在
  // function_exists()
  // class_exists()
  // file_exists()

  //> 类和对象
  class Car {

    function __construct() {
      print '构造函数已执行';
    }

    public $speed = 0;

    static $fast = 100;

    public $carName = '汽车';

    //定义受保护的属性
    protected $corlor = '白色';

    //定义私有属性
    private $price = '100000';

    public function getName () {
      echo $this->carName;
    }

    public function getColor () {
      echo $this->corlor;
    }

    public function getPrice () {
      echo $this->price;
    }

    public static function getFast () {
      echo self::$fast;
    }

    // 静态方法
    public static function getType () {
      echo '汽车';
    }

    public function speedUp () {
      $this->speed += 10;
      return $this->speed;
    }

    public function getSpeed () {
      echo $this->speed;
    }
  }

  $car = new Car();
  $car->carName = '兰博基尼';
  $car->getName();
  // $car->corlor = '黑色';
  $car->getColor();
  // $car->price = '200';
  $car->getPrice();
  $car::getType();
  $car::getFast();
  $car->speedUp();
  $car->getSpeed();

  // 原型继承
  class Bus extends Car {
    public function speedUp () {
      $this->speed += 30;
    }

    public function __call ($name, $args) {
      if ($name == 'speedDown') {
        $this->speed -= 10;
      }
    }

  }

  $bus = new Bus();
  $bus->speedUp();
  $bus->getSpeed();
  $bus->speedDown();
  $bus->getSpeed();

  //> 对象序列化成字符串
  $busStr = serialize($bus);
  echo $busStr  . '<br>';
  $org = unserialize($busStr);
  var_dump($org);

  $longStr = <<<EOF
  
  1.以 <<< End开始标记开始，以End结束标记结束，结束标记必须顶头写，不能有缩进和空格，且在结束标记末尾要有分号 。开始标记和开始标记相同，比如常用大写的EOT、EOD、EOF来表示，但是不只限于那几个，只要保证开始标记和结束标记不在正文中出现即可。

EOF;

  echo $longStr;

  echo "str is $longStr";


?>

</body>
</html>
