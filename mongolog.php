<?php
MongoLog::setModule( MongoLog::ALL );
MongoLog::setLevel( MongoLog::ALL );
$m = new MongoClient("mongodb://marce:12345@oceanic.mongohq.com:10054/tinyblog");
print_r( $m->getConnections() );
?>