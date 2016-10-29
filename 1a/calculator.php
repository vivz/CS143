<html>
<head><title>Calculator</title></head>
<body>

<h1>Calculator</h1>
(Ver 1.4 1/11/2014 by Yuchen Liu)<br />
Type an expression in the following box (e.g., 10.5+20*3/25).
<p>
    <form action="calculator.php" method="GET">
        <input type="text" name="expr">
        <input type="submit" value="Calculate">
    </form>
</p>

<ul>
    <li>Only numbers and +,-,* and / operators are allowed in the expression.
    <li>The evaluation follows the standard operator precedence.
    <li>The calculator does not support parentheses.
    <li>The calculator handles invalid input "gracefully". It does not output PHP error messages.
</ul>

Here are some(but not limit to) reasonable test cases:
<ol>
  <li> A basic arithmetic operation:  3+4*5=23 </li>
  <li> An expression with floating point or negative sign : -3.2+2*4-1/3 = 4.46666666667, 3*-2.1*2 = -12.6 </li>
  <li> Some typos inside operation (e.g. alphabetic letter): Invalid input expression 2d4+1 </li>
</ol>

<?php
  $webInput = $_GET["expr"];
  $equ = str_replace("--", "- -", $webInput);
  $devidedByZeroPattern = "/\/0(\.0+)?/";
  //$validPattern = "/^[-+*.\/, 0-9]+$/";
  $validPattern = "/^(\s*\-?(?!0+[0-9])[0-9]+(\.[0-9]+)?\s*[\+\-\*\/]?)*$/";
  $isValid = preg_match($validPattern, $equ);
  $isDevidedByZero = preg_match($devidedByZeroPattern, $equ);

  if($webInput == "") {
  } elseif ($isDevidedByZero) {
    echo "<h2>Result</h2>";
    echo "Division by zero error!";
  } elseif ($isValid) {
    eval( "\$ans=$equ;");
    if (is_null($ans)) {
      echo "<h2>Result</h2>";
      echo "Invalid Expression!"."<br />";
    } else {
      echo "<h2>Result</h2>";
      echo $equ . "=" . $ans."<br />";
    }
  } else {
      echo "<h2>Result</h2>";
      echo "Invalid Expression!"."<br />";
  }
?>

</body>
</html>
