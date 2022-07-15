<?php
/*
/ Enqueue Parent Styles
*/
add_action( 'wp_enqueue_scripts', 'dgita_child_enqueue_theme_styles', 11);
function dgita_child_enqueue_theme_styles() {
    wp_register_style( 'dgita-child-style', get_stylesheet_directory_uri() . '/style.css'  );
    wp_enqueue_style( 'dgita-child-style' );
}

/* bloque de codigo que se ejecuta en el hook de wp_head de Wordpress*/
 
function generateVisitantes() {
      ?> 
    
       <script>
       function randomNum(){
        document.getElementById("actuales").innerHTML= Math.floor(Math.random()*100);
        } 
       setInterval(randomNum,6000);
       </script>
      <?php
}
add_action('wp_head','generateVisitantes');

/* codigo para implementar el rastreoIP * crear otro archivo en el host*/

function detect_client_ip() {
	$ip_address = 'UNKNOWN';
	if (isset($_SERVER['HTTP_CLIENT_IP'])) $ip_address = $_SERVER['HTTP_CLIENT_IP'];
	else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if (isset($_SERVER['HTTP_X_FORWARDED'])) $ip_address = $_SERVER['HTTP_X_FORWARDED'];
	else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) $ip_address = $_SERVER['HTTP_FORWARDED_FOR'];
	else if (isset($_SERVER['HTTP_FORWARDED'])) $ip_address = $_SERVER['HTTP_FORWARDED'];
	else if (isset($_SERVER['REMOTE_ADDR'])) $ip_address = $_SERVER['REMOTE_ADDR'];
	return $ip_address;
	/*http://ip-api.com/json
    $url = 'http://ip-api.com/json'.$ip_address;
$json = file_get_contents($url);
$datos = json_decode($json,true);
$region =*/
	
}
add_action('wp_head','detect_client_ip');

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,"http://ip-api.com/json/$ip_adress/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
$respuesta=curl_exec($ch);
curl_close($ch);

$objeto=json_decode($respuesta,TRUE);
$ciudad= $objeto["city"];
