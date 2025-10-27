<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Error</title>
    <style>
        body { font-family: Consolas, monospace; background: #fff; color: #222;}
        .container { margin: 20px auto; max-width: 700px; }
        .error-title { color: #c00; }
    </style>
</head>
<body>
<div class="container">
    <h1 class="error-title">A PHP Error was encountered</h1>
    <p>Severity: <?php echo $severity; ?></p>
    <p>Message: <?php echo $message; ?></p>
    <p>Filename: <?php echo $filepath; ?></p>
    <p>Line Number: <?php echo $line; ?></p>
</div>
</body>
</html>
