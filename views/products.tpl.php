<?php

/**
 * $viewData contient la liste des produits
 * 
 * Je vais pouvoir faire une boucle pour afficher les produits qui se trouvent dans $viewData
 */
// var_dump($viewData);
?>

<?php foreach ($viewData as $product) : ?>
	<section class="page-section">
		<div class="container">
			<div class="product-item">
				<div class="product-item-title d-flex">
					<div class="bg-faded p-5 d-flex ml-auto rounded">
						<h2 class="section-heading mb-0">
							<span class="section-heading-upper"><?= $product['title']; ?></span>
							<span class="section-heading-lower"><?= $product['category']; ?></span>
						</h2>
					</div>
				</div>
				<img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="<?= $product['image']; ?>" alt="all products">
				<div class="product-item-description d-flex mr-auto">
					<div class="bg-faded p-5 rounded">
						<p class="mb-0"><?= $product['description']; ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endforeach; ?>

<!-- <section class="page-section">
	<div class="container">
		<div class="product-item">
			<div class="product-item-title d-flex">
				<div class="bg-faded p-5 d-flex mr-auto rounded">
					<h2 class="section-heading mb-0">
						<span class="section-heading-upper">Delicious Treats, Good Eats</span>
						<span class="section-heading-lower">Bakery &amp; Kitchen</span>
					</h2>
				</div>
			</div>
			<img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="img/products-02.jpg" alt="croissant">
			<div class="product-item-description d-flex ml-auto">
				<div class="bg-faded p-5 rounded">
					<p class="mb-0">Our seasonal menu features delicious snacks, baked goods, and even full meals perfect for breakfast or lunchtime. We source our ingredients from local, oragnic farms whenever possible, alongside premium vendors for specialty goods.</p>
				</div>
			</div>
		</div>
	</div>
</section> -->