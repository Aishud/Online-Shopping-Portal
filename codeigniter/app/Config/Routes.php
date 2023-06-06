<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('loginl', 'login::login');
$routes->get('loginl', 'login::login');
$routes->post('login', 'login::index');
$routes->get('login', 'login::index');
$routes->post('signup', 'signup::index');
$routes->get('signup', 'signup::index');
$routes->post('tt', 'tt::tt');
$routes->get('tt', 'tt::tt');

$routes->get('userhome', 'userhome::index');
$routes->post('userhome', 'userhome::index');
$routes->post('userprofile', 'userprofile::index');
$routes->get('userprofile', 'userprofile::index');

$routes->post('adminhome', 'adminhome::index');
$routes->get('adminhome', 'adminhome::index');
$routes->post('adminprofile', 'adminhome::aprofile');
$routes->get('adminprofile', 'adminhome::aprofile');
$routes->get('adminprofilel', 'adminprofile::adminprofile');
$routes->post('adminprofilel', 'adminprofile::adminprofile');
$routes->post('pdtpage', 'userhome::pdtpage');
$routes->get('pdtpage', 'userhome::pdtpage');
$routes->post('pdtpagel', 'pdtpage::index');
$routes->get('pdtpagel', 'pdtpage::index');
$routes->post('userprofilel', 'userprofile::userprofile');
$routes->get('userprofilel', 'userprofile::userprofile');

$routes->get('userprofilell', 'adminhome::aprofile');
$routes->post('userprofilell', 'adminhome::aprofile');

$routes->get('pdtsearchl', 'userhome::pdtsearch');
$routes->post('pdtsearchl', 'userhome::pdtsearch');

$routes->get('pdtsearch', 'pdtsearch::index');
$routes->post('editprofile', 'editprofile::index');
$routes->get('editprofile', 'editprofile::index');
$routes->post('editprofilel', 'editprofile::editprofile');
$routes->get('editprofilel', 'editprofile::editprofile');
 $routes->get('addtocart', 'pdtsearch::addtocart');

$routes->post('viewcartk', 'viewcart::index');
$routes->get('viewcartk', 'viewcart::index');

$routes->post('viewcart', 'pdtsearch::viewcart');
$routes->get('viewcart', 'pdtsearch::viewcart');

// $routes->get('buynow', 'pdtsearch::buynow');
// $routes->post('buynow', 'pdtsearch::buynow');
$routes->post('addtocartl', 'pdtsearch::addtocart');
$routes->post('viewcartl', 'pdtsearch::viewcart');
$routes->get('viewcartl', 'pdtsearch::viewcart');

$routes->post('deletecartitem', 'pdtsearch::deletecartitem');

$routes->post('buynowl', 'pdtsearch::buynow');
$routes->post('buynowlk', 'pdtsearch::buynowk');

// $routes->get('buynowl', 'pdtsearch::buynow');
$routes->post('myordersl', 'userhome::myorders');
$routes->get('myordersl', 'userhome::myorders');
$routes->post('myorders', 'myorders::index');
$routes->get('myorders', 'myorders::index');

// $routes->post('myordersl', 'myorders::myorders');
// $routes->get('myordersl', 'myorders::myorders');
// $routes->post('addpdtl', 'viewpdts::addpdt');
$routes->post('addpdtl', 'addpdt::index');
$routes->post('addpdt', 'addpdt::addpdt');
$routes->post('addpdtstockl', 'viewpdts::addpdtstockl');
$routes->get('addpdtstockp', 'addpdtstock::index');
$routes->post('addpdtstock', 'addpdtstock::addpdtstock');

$routes->post('viewpdts', 'adminhome::viewpdts');
$routes->get('viewpdts', 'adminhome::viewpdts');
$routes->post('viewpdtsl', 'viewpdts::index');
$routes->get('viewpdtsl', 'viewpdts::index');
$routes->get('editpdtl', 'viewpdts::editpdt');
$routes->get('deletepdtl', 'viewpdts::deletepdt');
$routes->post('editpdtl', 'viewpdts::editpdt');
$routes->post('deletepdtl', 'viewpdts::deletepdt');
$routes->get('editpdt', 'editpdt::index');
// $routes->post('editpdt', 'editpdt::index');
$routes->post('editpdtk', 'editpdt::editpdt');
$routes->get('editpdtk', 'editpdt::editpdt');


$routes->post('viewusersl', 'adminhome::viewusers');
$routes->get('viewusersl', 'adminhome::viewusers');
$routes->post('viewusers', 'viewusers::index');
$routes->get('viewusers', 'viewusers::index');

$routes->post('viewordersl', 'adminhome::vieworders');
$routes->get('viewordersl', 'adminhome::vieworders');

$routes->post('vieworders', 'vieworders::index');
$routes->get('vieworders', 'vieworders::index');
$routes->post('deleteorder', 'vieworders::deleteorder');
$routes->get('deleteorder', 'vieworders::deleteorder');
$routes->post('deletemyorder', 'myorders::deletemyorder');
$routes->get('deletemyorder', 'myorders::deletemyorder');

$routes->get('deleteuserp', 'viewusers::deleteuserp');

$routes->post('deleteuser', 'deleteuser::index');
$routes->get('deleteuser', 'deleteuser::index');
$routes->post('deleteuserl', 'deleteuser::deleteuser');
$routes->get('deleteuserl', 'deleteuser::deleteuser');
$routes->post('canceldelete', 'deleteuser::canceldelete');
$routes->get('canceldelete', 'deleteuser::canceldelete');

$routes->get('edituserprofilel', 'viewusers::edituserprofilel');
$routes->get('edituserprofile', 'edituserprofile::index');
$routes->post('edituserprofilek', 'edituserprofile::edituserprofile');
$routes->get('edituserprofilek', 'edituserprofile::edituserprofile');

$routes->post('logout', 'login::index');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
