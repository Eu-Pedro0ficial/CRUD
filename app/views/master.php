<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Crud</title>
</head>
<body>
    <header>
        <a href="/?view=register">Register</a> |
        <a href="/?view=home">Home</a> |
        <?php if(isset($_SESSION['LOGGED'])): ?>
            <a href="/?controllers=loggout">loggout</a> |
            <a href="/?view=profile">Profile</a>
        <?php else: ?>
            <a href="/?view=login">Login</a>
        <?php endif; ?>
    </header>
    <div class="container">
        <?php load(); ?>
    </div>
</body>
</html>