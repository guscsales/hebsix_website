<?php
    http_response_code(404);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Agência Hebsix - Página não encontrada</title>
        <meta name="description" content="Página não encontrada.">
        <meta name="author" content="Agência Hebsix"> 
        <meta name="robots" content="noindex">

        <link href="/assets/plugins/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/main.css" rel="stylesheet" type="text/css"/>

        <link rel="icon" type="image/png" href="favicon-16x16.png" />

        <style>
            #main-header{
                position: fixed;
                width: 100%;
                height: 100%;
            }

            .title{
                margin-top:110px;
            }

            p{
                color:#fff;
            }
        </style>
    </head>
    <body>
        <header id="main-header">
            <div id="home"></div>
            <div class="container">
                <h1>hebsix</h1>

                <nav>
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="/#a-agencia">A Agência</a>
                        </li>
                        <li>
                            <a href="/#o-que-fazemos">O Que Fazemos</a>
                        </li>
                        <li>
                            <a href="/#solicite-um-orcamento">Solicite um Orçamento</a>
                        </li>
                        <li>
                            <a href="/#contato">Contato</a>
                        </li>
                    </ul>
                </nav>

                <div class="slider">
                    <div class="slide">
                        <span class="title">
                            Erro 404
                        </span>

                        <p class="lead">Infelizmente essa página não foi encontrada.<br>Continue no site pelo menu ao lado.</p>
                    </div>
                </div>

                <div class="fb-page" data-href="https://www.facebook.com/agenciahebsix/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
            </div>
        </header>

        <?php
            include '../includes/scripts.php';
        ?>
    </body>
</html>