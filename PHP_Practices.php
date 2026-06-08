<!DOCTYPE html>
<html>
    <head>
        <style>
            .error{
                color: #ff0000;
            }
        </style>
</head>
<body>

<?php
// datatypes
$x = 5;
var_dump($x);
$xx = 'Hello world!';
var_dump($xx);
$xy = 5985;
var_dump($xy);
$xz = 10.365;
var_dump($xz);
$xi = true;
var_dump($xi);
$cars = array("Volvo","BMW","Toyota");
var_dump($cars);
$xo = "Hello world!";
$xo = null;
var_dump($xo);
// datatypes

// control structures
$t = 14;

if ($t < 20) {
  echo "Have a good day!<br>";
}

$a = 200;
$b = 33;
$c = 500;

if ($a > $b && $a < $c ) {
  echo "Both conditions are true <br>";
}
$q = date("H");

if ($q < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!<br>";
}

$w = date("H");

if ($w < "10") {
  echo "Have a good morning!";
} elseif ($w < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night! <br>";
}

$d = 13;

if ($d > 10) {
  echo "Above 10";
  if ($d > 20) {
    echo " and also above 20";
  } else {
    echo " but not above 20";
  }
}

$favcolor = "red";

switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!";
    break;
  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!<br>";
}

$e = 1;

while ($e < 6) {
  echo $e;
  $e++;
} 

$f = 1;
while ($f < 6) {
  if ($f == 3) break;
  echo $f;
  $f++;
}

$g = 8;

do {
  echo $g;
  $g++;

} while ($g < 6);

for ($ae = 10; $ae >= 0; $ae--) {
  echo "The number is: $ae <br>";
}

$members = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach ($members as $key => $value) {
  echo "$key : $value <br>";
}
// control structures

// function
function myMessage() {
  echo "Hello world!";
}

myMessage();

function familyName($fname) {
  echo "$fname Refsnes.<br>";
}

familyName("Jani");
familyName("Hege");
familyName("Stale");
familyName("Kai Jim");
familyName("Borge");

function sum($h, $j) {
  $k = $h + $j;
  return $k;
}

echo "5 + 10 = " . sum(5, 10) . "<br>";
echo "7 + 13 = " . sum(7, 13) . "<br>";
echo "2 + 4 = " . sum(2, 4);
// function

//forms
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>


</body>
</html>