<?php 

// No mostrar version de Wordpress
function quitar_version() {
	return '';
}
add_filter('the_generator', 'quitar_version');

//Error de login
function mal_login() {
	return 'Wrong username or password.';
}
add_filter('login_errors', 'mal_login');


?>