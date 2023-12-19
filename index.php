<?php
require __DIR__ . '/vendor/autoload.php';
$Parsedown = new Parsedown();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MD to HTML</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <div class="d-flex justify-content-center align-content-center m-3">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
        <div id="editor-container" class="m-4 w-50" style="height:80vh;border:1px solid grey"></div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
        <script src="js/init.js"></script>
        <div id="converted-container" class="m-4 w-50" style="height:80vh;border:1px solid grey">
            <?php echo $Parsedown->text("## h2");?>
</div>
    </div>
</body>
</html>
