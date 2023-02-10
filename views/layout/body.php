

<main>

<?php $cats = get_cats(); ?>

    <div id="categories">
        <?php foreach($cats as $cat) : ?>
            <a href="index.php?catID=<?php echo $cat['catID'] ?>" title="<?php echo $cat['catName'] ?>">
                <div class="category" style="<?php echo $cat['catImage']?>">
                    <div class="cat_label">  
                        <?php echo $cat['catName'] ?>
                        <!-- <img src="assets/images/brushes.png"/> -->
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    
</main>


<!-- Decorative -->
<div id="saleCat">
    <h3>SALE</h3>
</div>



<!-- ------- PREVIOUS CODE // NOT RELEVANT -------- -->

<!-- <main>
    <div id="categories">
<span id="cat_label1">Brushes
<img src="../images/brushes.png" alt="category1" class="category" id="cat1"></span>
<span id="cat_label2">Exfoliates
<img src="../images/exfoliates.png" alt="category2" class="category" id="cat2"></span>
<span id="cat_label3">Soap Bars
<img src="../images/soapBars.png" alt="category3" class="category" id="cat3"></span>
<span id="cat_label4">Hand Soaps
<img src="../images/handSoaps.png" alt="category4" class="category" id="cat4"></span>

    </div>
</main> -->

