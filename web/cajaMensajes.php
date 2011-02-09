<!--
    Copyright (C) <2011>  <rubentxu>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body> <!--Solo se coge la caja de menasje-->
        <div id="cajaMensaje">
            <form action="#" method="post">
                <fieldset>
                    <legend>Escribe tu ptuit</legend>
                    <textarea name="mensaje" title="mensaje" cols="80" rows="3" >
                        <?php echo $datos
                        ?></textarea>
                    <input title="enviar" name="ptuit" value="ptuit.." type="submit"/>
                </fieldset>
            </form>
        </div>

    </body>
</html>
