

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




