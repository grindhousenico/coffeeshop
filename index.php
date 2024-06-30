<?php

require_once __DIR__ . '/controllers/MainController.php';

// Une première manière d'écrire ce test  
// Vérifier si la variable page existe dans l'URL
// if (isset($_GET['page'])) {
// 	// nom de la page demandée
// 	$requestedPage = $_GET['page'];
// } else { // la variable n'existe pas, je mets une valeur par défaut dans $requestedPage
// 	$requestedPage = 'home';
// }


// Une autre manière d'écire le test
// Utiliser la notation ternaire :
// (une condition) ? {valeur si vrai} : {valeur si faux}
// $requestedPage = isset($_GET['page']) ? $_GET['page'] : 'home';


// Une troisième et dernière manière de l'écrire
// l'opérateur coalescent
// gère le isset tout seul :
// (variable à tester avec isset) ?? {valeur si faux} 
// si vrai, la variable est automatiquement retournée
$requestedPage = $_GET['page'] ?? '/';


// Ce serait formidable qu'on puisse avoir de belles URL
// Par exemple mosite/products pour la page des produits
// ou monsite/store pour la page des horaires
// .htaccess => règle de réécriture des URL
// l'URL : ?page=products devient /products
// l'URL : ?page=store devient /store

// Liste des routes accessibles pour les visiteurs
// Pour chacune de ces routes, j'indique le nom de la méthode à appeler dans le controller
$routes = [
	'/' => 'home', // page d'accueil
	'/products' => 'products', // page de la liste des produits
	'/store' => 'store', // page des horaires
];



// ==============================
// =========== ROUTER ===========
// ==============================

// Vérifier, est-ce que la page demandée par le visiteur (qui est dans $requestedPage)
// fait bien partie de la liste des routes autorisées (les clés du tableau $routes)
if (array_key_exists($requestedPage, $routes)) {
	// Oui, la page demandée est dans les clés du tableau des routes

	// Nouvelle instance de MainController
	$controller = new MainController();

	// Récupère le nom de la fonction à appeler depuis le tableau des routes
	$methode = $routes[$requestedPage];

	// Appeler la méthode du controller
	$controller->$methode();
	
} else {
	// Non, la page demandée n'existe pas !
	echo '404 not found :/';
}






// Appeler les fonction soit home() soit products() soit store() dans le MainController
// variable : $controller
// selon la page demandée par le visiteur


// $requestedPage contient le nom de la fonction à appeler
// dans le MainController 
// J'appel directement la bonne fonction à partir de son nom qui est stocké
// dans la variable $requestedPage
// $controller->$requestedPage();

// switch ($requestedPage) {
// 	case ('home'):
// 		$controller->home();
// 		break;

// 	case ('products'):
// 		$controller->products();
// 		break;

// 	case ('store'):
// 		$controller->store();
// 		break;
// }








// charge l'entete du site
// require_once __DIR__ . '/views/header.tpl.php';

// le switch n'est plus necessaire grace à la fonction show :)
// Déterminer quelle vue doit etre chargée selon $requestedPage
// switch ($requestedPage) {

// 	case ('store'): // cas où $requestedPage === 'store'
// 		// require_once __DIR__ . '/views/store.tpl.php';
// 		show('store');
// 		break; // fin, sort du switch

// 	case ('products'): // cas où $requestedPage === 'products'
// 		// require_once __DIR__ . '/views/products.tpl.php';
// 		show('products');
// 		break;

// 	case ('home'): // cas où in affiche la page d'accueil
// 		//require_once __DIR__ . '/views/home.tpl.php';
// 		show('home');
// 		break;

// 	default: // cas par défaut, une page 404
// 		echo '404 not found';
// }





// $requestedPage passe dans l'argument $viewName
// $products passe dans l'argument $viewData
// show($requestedPage, $products);

// Erreur
// show();
// Erreur => la fonction show attend 1 argument, le premier, qui s'appel $viewName
// Le deuxième argument, $viewData, prend une valeur par défaut : un tableau vide
// Si je ne renseigne pas le deuxième argument, la valeur par défaut est utilisée

// charge le pied de page du site
// require_once __DIR__ . '/views/footer.tpl.php';