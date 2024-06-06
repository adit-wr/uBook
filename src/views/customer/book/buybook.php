<?php
$data = Message::getData();
if($data) {
    $book['username'] = $data['username'];
    $book['name'] = $data['name'];
    $book['publisher'] = $data['publisher'];
    $book['stock'] = $data['stock'];
    $book['newstock'] = $data['newstock'];
    $book['price'] = $data['price'];
    $book['image'] = $data['image'];
}
Message::flash();
?>
        <div class="containercart">
            <h1>Cart</h1>
            <div class="maincart">
                <div class="imagecart">
                    <img src="<?= BASEURL . '/public/img/book/' . $book['image'] ?>" alt="<?= $book['image'] ?>" width="250px" height="350px">
                    <div class="showcart">
                        <div class="namecart">
                            <h2><?= $book['name'] ?></h2>
                            <h5>by <?= $book['publisher'] ?></h5>
                        </div>
                        <div class="bottomcart">
                            <form id="form" action="<?= BASEURL . '/customer/buybookproccess' ?>" method="post">
                                <input type="hidden" name="id" value="<?= $book['id_book'] ?>">
                                <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
                                <input type="hidden" name="book" value="<?= $book['name'] ?>">
                                <input type="hidden" name="price" value="<?= $book['price'] ?>">
                                <input type="hidden" name="image" value="<?php echo $book['image'] ?>">
                                <!-- <?php echo $book['image']; ?> -->
                                <div class="cartstock">
                                    <input type="text" name="newstock" value="1">
                                </div>
                                <div class="pricee">
                                    <h3><?= $book['stock'] ?> left</h3>
                                    <h2>Rp.<?= $book['price'] ?></h2>
                                </div>
                                <input type="hidden" name="mode" id="mode" value="update">
                                <div class="buttonbotcart">
                                    <button class="tbuy" type="button" onclick="location.href='<?= BASEURL . '/customer/book' ?>' ">Cancel</button>
                                    <button class="tbuy" type="submit">Buy<span class="material-symbols-outlined">shopping_cart</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>