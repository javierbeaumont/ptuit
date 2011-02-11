<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

    <head>
        <title>Ptuit </title>
        <link rel="stylesheet" href="/web/css/style.css" type="text/css"/>
        <script type="text/javascript" src="/web/js/jquery.js"></script>
        <script type="text/javascript" src="/web/js/contadorTexto.js"></script>
    </head>

    <body>

        <div id="header">
            <img src="/web/imagen/logo.png" alt="ptuit" />
            <a id="registro" href="registro.php">Registrarse</a>
            <a id="login" href="login.php">Login</a>
        </div>

        <div id="content">
            <div id="marco">
                <div id="cajaMensaje">
                    <form action="#" method="post">
                        <fieldset >
                            <legend>Escribe tu ptuit</legend>
                            <textarea id="txtMen" name="mensaje" title="mensaje" cols="63" rows="2" ></textarea>
                            <input id="botonTxt" title="enviar" name="ptuit" value="ptuit.." type="submit"/>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>

        <div id="footer">
            <div id=cc>Ptuit 2011 </div>
        </div>
    </body>
</html>
