<!DOCTYPE html>
<html>
<body>

<?php
$flower = array("Sunflower", "Rose", "Dahlia");

sort($flower);
$clength = count($flower);
echo "<br><b>Sort Flower in ascending order</b><br>";
for($x = 0; $x < $clength; $x++) {
    echo $flower[$x];
    echo "<br>";
}

$flower = array("Sunflower", "Rose", "Dahlia");
rsort($flower);
$clength = count($flower);
echo "<br><b>Sort Flower in descending order</b><br>";
for($x = 0; $x < $clength; $x++) {
    echo $flower[$x];
    echo "<br>";
}

$flower_assoc = array("one" => "Sunflower", "two" => "Rose", "three" => "Dahlia");
asort($flower_assoc);
echo "<br><b>Sort Flower associative array in ascending order according to the value</b><br>";
foreach($flower_assoc as $x => $value) {
    echo $x . " = " . $value . "<br>";
}

ksort($flower_assoc);
echo "<br><b>Sort Flower associative array in ascending order according to the key</b><br>";
foreach($flower_assoc as $x => $value) {
    echo $x . " = " . $value . "<br>";
}

arsort($flower_assoc);
echo "<br><b>Sort Flower associative array in descending order according to the value</b><br>";
foreach($flower_assoc as $x => $value) {
    echo $x . " = " . $value . "<br>";
}

krsort($flower_assoc);
echo "<br><b>Sort Flower associative array in descending order according to the key</b><br>";
foreach($flower_assoc as $x => $value) {
    echo $x . " = " . $value . "<br>";
}
?>

</body>
</html>
