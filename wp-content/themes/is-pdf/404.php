<?php
function replace_every_char($req) {
		$req = htmlspecialchars($req);
		$req = str_replace('/search/', '', $req);
		$req = str_replace('/', '', $req);
		$req_a = explode(' ',$req);
		$req_new = array();
		foreach ($req_a as $new) {
			$req_new[] = ucwords(trim($new));
		}
		$req = implode(' ', $req_new);
		return $req;
	}
?>
<?php
if($_SERVER['REQUEST_URI']){
$replacecode = array (' ','++','+++','-');
$urlredirect = get_settings('home') . '/db/' . strtolower(str_replace($replacecode, '-' ,replace_every_char($_SERVER['REQUEST_URI']))) . '';
header("HTTP/1.1 301 Moved Permanently");
header( "Location: $urlredirect" ) ;
die();
}
?>