<?php

/**
 * Le controller dont la responsabilité est d'afficher les vues demandées par le visiteur.
 */
class MainController
{
	/**
	 * Cette fonction charge les templates header, "page" puis footer
	 *
	 * @param [string] $viewName argument qui contient le nom de la vue à charger
	 * @param [array] $viewData tableau des données à afficher dans les vues. Par défaut $viewData est un tableau vide []
	 * @return void rien
	 */
	private function show($viewName, $viewData = [])
	{
		// J'ai maintenant dans la fonction show une nouvelle variable
		// qui s'appelle $viewData et qui contient ma liste des produits

		require_once __DIR__ . '/../views/header.tpl.php';
		require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
		require_once __DIR__ . '/../views/footer.tpl.php';
	}

	/**
	 * Gère l'affichade de la page d'accueil
	 *
	 * @return void
	 */
	public function home()
	{
		// Appel la fonction show qui est dans le MainController
		// Argument 1 : nom du template à charger. Pour la page d'accueil c'est "home"
		// Pour le moment, pas besoin de données à envoyer pour la page d'accueil
		// donc pas besoin du deuxième argument
		$this->show('home');
	}

	/**
	 * Gère l'affichage des produits
	 *
	 * @return void
	 */
	public function products()
	{
		// Imaginons que nous avons une base de données pour stocker les produits
		// Imaginons qu'on récupère chaque produit sous forme d'un tableau
		// Données pour le produit 1
		$product1 = [
			'title' => 'SUPER BLENDED TO PERFECTION',
			'category' => 'COFFEES & TEAS',
			'image' => 'img/products-01.jpg',
			'description' => 'La description du produit numéro 1',
		];
		// Données pour le produit 2
		$product2 = [
			'title' => 'MARVELOUS DELICIOUS TREATS, GOOD EATS',
			'category' => 'BAKERY & KITCHEN',
			'image' => 'img/products-02.jpg',
			'description' => 'La description du produit numéro 2',
		];

		// products : un tableau dans lequel je vais mettre toutes les données à envoyer à la vue
		$products = [$product1, $product2];

		// Affiche le template des produits avec les données de chaque produit
		// argument 1 : le nom du template à charger
		// argument 2 : les données à mettre dans la vue
		$this->show('products', $products);
	}

	/**
	 * Gère l'affichage de la page store
	 *
	 * @return void
	 */
	public function store()
	{
		// Appel la fonction show qui est dans le MainController
		// Argument 1 : nom du template à charger. Pour la page d'accueil c'est "store"
		// Pour le moment, pas besoin de données à envoyer pour la page d'accueil
		// donc pas besoin du deuxième argument

		$weekOpeningHours = [
			'Sunday' => 'Closed', 
			'Monday' => '7:00 AM to 8:00 PM',
			'Tuesday' => '7:00 AM to 8:00 PM',
			'Wednesday' => '7:00 AM to 8:00 PM',
			'Thursday' => '7:00 AM to 8:00 PM',
			'Friday' => '7:00 AM to 8:00 PM',
			'Saturday' => '9:00 AM to 5:00 PM'
		];

		// spoiler : c'est ici qu'il faudra "charger" les données pour les horaires d'ouverture
		// puis envoyer à la vue les horaire, avec le deuxième arguement de la fonction show

		// tableau à compléter
		$this->show('store',$weekOpeningHours);
	}
}