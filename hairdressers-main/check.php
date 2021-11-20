<?php
$username = filter_var(trim($_POST['username']),
FILTER_SANITIZE_STRING);
$userlogin = filter_var(trim($_POST['userlogin']),
FILTER_SANITIZE_STRING);
$userpassword = filter_var(trim($_POST['userpassword']),
FILTER_SANITIZE_STRING);

// if(mb_strlen($name) < 6 || mb_strlen($name) > 66) {
//   echo "Недопустима довжина ім'я";
//   exit();
// }
if(mb_strlen($userlogin) < 6 || mb_strlen($userlogin) > 66) {
  echo "Недопустима довжина логіна";
  exit();
}
if (mb_strlen($userpassword) < 6) {
  echo "Надто короткий пароль";
  exit();
}

$userpassword = md5($userpassword."lolololo");

$mysql = new mysqli('localhost','root','root','regbd');
$mysql->query("INSERT INTO `users` (`username`, `userlogin`, `userpassword`) VALUES ('$username', '$userlogin', '$userpassword')");

$mysql->close();

header('location: /');
?>
