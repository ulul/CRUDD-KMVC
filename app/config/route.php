<?php
/**
 * route  yaitu untuk memanipulasi url tanpa htaccess contoh kita akan megakses controller/index
 * $route["alias"] = "controller/index";
 * Akses url yaitu "http://localhost/root_dir/alias" / http://localhost/alias
 * jika anda menggunakan parameter url jangan menggunakan uri routing karena fitur masih belum sempurna
 * */


$route["app.mvc"] = "controller/index";
$route["crudd/add_post.html"] = "crudd/add_post";

// End Of file route.php
