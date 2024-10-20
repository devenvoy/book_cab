<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>