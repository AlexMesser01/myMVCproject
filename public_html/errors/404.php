<?
    $referer = $_SERVER["HTTP_REFERER"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column
        }
        .error404{
            font-size: 100px;
            color: #000
        }
    </style>
</head>
<body>
    <form action="<?$referer?>"><input type="submit"></form>
    <div class="error404">404</div>
</body>
</html>