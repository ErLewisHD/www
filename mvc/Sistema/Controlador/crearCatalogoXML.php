<?php

	$sql= "SELECT concat('<row>
                <nombre>',nombre,'</nombre>',
                '<pvp>',pvp,'<pvp>',
                '<color>',color,'<color>
                <row>') as '<datos>' from articulo into outfile 'catalogoRamos.xml' ";

?>
