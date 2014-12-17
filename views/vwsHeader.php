<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>
        <link type="text/css" rel="stylesheet" href="views/css/style.css" />
        <?php echo $linksCabecalho; ?>
    </head>
    <body>
        <div class="container">
            <header>
                    <div class="headerBarMenu">
                        <div class="headerBarMenuCenter">
                            <nav>
                                <div class="headerMenu">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="?action=cadastro">Cadastro</a></li>
                                        <li><a href="?action=editar">Editar</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
            </header>
            <section>
                <main>
                    <?php echo $msgInformativo ?>
                