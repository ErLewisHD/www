<?php

	$sql= "SELECT CONCAT('<row>
                <nombre>',nombre,'</nombre>',
                '<pvp>',pvp,'<pvp>',
                '<color>',color,'<color>
                <row>') AS '<datos>' FROM articulo INTO OUTFILE 'C:\wamp64\www\mvc\Sistema\Controlador\catalogoRamos.xml' ";

?>
