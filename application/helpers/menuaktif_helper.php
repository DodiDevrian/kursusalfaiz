<?php  
	function menuAktif($class = ''){
		$ci =& get_instance();

		if($ci->router->fetch_class() == $class){
			return 'active';
		}
	}
?>