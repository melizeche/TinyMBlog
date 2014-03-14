<?php
$m = new Mongo("mongodb://whisky:13000/?replicaSet=seta");
print_r( $m->getConnections() );
?>