<?php
    
    require ('../layout/header.php');
?>

    <!-- Sessão produtos  -->

<section class="products" id="products">

    <h1 class="heading"><span>produtos</span> </h1>

    <div class="box-container">

        <div class="box">
            <span class="discount">-10%</span>

            <div class="image">
                <img src="images/img-1.jpg" alt="">
                
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="cart-btn">add to cart</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
                
            </div>

            <div class="content">
                <h3>flower pot</h3>
                <div class="price"> $12.99 <span>$15.99</span> </div>
            </div>

        </div>

    </div>

</section>

<!-- Fim sessão produtos -->

<?php
    
    require ('../layout/footer.php');

?>