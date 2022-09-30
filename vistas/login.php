<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import de css, trabajaremos con bulma, sweetalert, fontawesome y toastr-->
    <!--Documentacion bulma en https://bulma.io/ para mas info-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

    <!--Import de scripts para la funcionalidad del front end y scripts para sweetalert y toastr-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="recursos/js/acceso.js"></script>

    <title>Desarrollo web 2020</title>
</head>

<body>

    <!--Formulario-->
    <section class="section container">
        <div class="columns is-centered">
            <div class="column is-4">
                <div class="box">
                    <h1 class="title has-text-centered">
                        Inicio Sesion
                    </h1>
                    <div class="field">
                        <div class="control has-icon has-icons-left">
                            <input class="input" type="text" id="" />
                            <span class="icon is-left">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <p>RUT</p>
                    </div>
                    <div class="field">
                        <div class="control has-icon has-icons-left">
                            <input class="input" type="password" id="" />
                            <span class="icon is-left">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                        </div>
                        <p>CONTRASEÑA</p>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="usuario">
                                Cliente
                            </label>
                            <label class="radio">
                                <input type="radio" name="usuario">
                                Tecnico
                            </label>
                        </div>
                    </div>
                    <div class="field is-horizontal is-grouped">
                        <div class="control">
                            <button class="button is-primary" id="entrar">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Fin Formulario-->

    <!--Inicio footer-->
    <footer class="footer container">
        <div class="content has-text-centered">
            <p>
                <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
            </p>
        </div>
    </footer>
    <!--Fin footer-->
</body>

</html>