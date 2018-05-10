<?php
function displayProducts($productsArray){
    echo '<table class="productTable">';
    echo '<tr><th>Product Name</th><th class="productcol">Product</th><th>Description</th><th>Price</th></tr>';
    foreach ($productsArray as $product) {
        $name = $product->getName();
        echo '<tr>';
        echo '<td>'.$product->getName().'</td>';
        echo '<td class="productcol"><img class="productimg" src="'.base_url().$product->getImageURL().'"></td>';
        echo '<td>'.$product->getDescription().'</td>';
        echo '<td>'.$product->getPrice().'$<br><br><input type="button" value="Add to Cart" onClick="addProductToCart(\''.$product->getProductId().'\',\''.$product->getPrice().'\',\''.$product->getName().'\')"></input></td>';
        echo "</tr>";
    }
    echo '</table>';
}
?>

<div class="right">
    <header id="header">
        <h1>JavaJam Coffee House</h1>
    </header>
    <div>
        <img id="headerimg" src="<?php echo base_url()?>assets/images/sofa.jpeg">
    </div>
        <div id="rightContent">
            <h3>JavaJam Gear</h3>
            <p>JavaJam Gear not only looks good, it's good to your wallet too.</p>
            <p>Get a 10% discount when you wear a JavaJam shirt or bring in your JavaJam mug!</p>
        </div>
        <div id="productsdiv">
        <?php
        displayProducts($productsArray);
        ?>
    </div>
</div>
   