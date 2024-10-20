<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File operation</title>
</head>
<?php
$fileWritePoint = fopen("data.txt", "a");
$content = "\n We are learning file functions in PHP";
fwrite($fileWritePoint, $content);
fclose($fileWritePoint);

$filePoint = fopen("data.txt", "r");
echo "File content: <br/>";
while (!feof($filePoint)) {
    echo fgets($filePoint) . "<br/>";
}
fclose($filePoint);


?>

<body>

</body>

</html>