<?php

class delp {
		function getInstance() {
			static $delp ;
			if (!$delp) $delp = new delp; 
			return $delp;
		}
		
		function delPost($id){
			$ii = new MongoID( $id );
			$collec = mIndex::getInstance()->connect("posts");
			$collec->remove(array('_id' => $ii));
		}
	}
?>
