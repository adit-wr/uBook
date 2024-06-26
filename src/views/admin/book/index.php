<?php
Message::flash();
?>
        <div class="container1">
            <div class="main"> 
                <h1>Book</h1>
                <div class="adbuk">
                    <button onclick="location.href='<?= BASEURL . '/admin/bookinsert' ?>'" type="button" class="tadd "><span class="material-symbols-outlined">library_add</span>New Book</button>
                </div>
                <div class="mainbook">
                    <?php
                        foreach($AllBook as $row):
                            $stok = $row['stock'];
                            if ($stok <= 0) {
                                $stock = "Out of stock";
                            } else {
                                $stock = $stok . " left";
                            }
                            $stockcolor = $stok <= 10 ? 'color:red;' : '';
                    ?>
                        <div class="showbook">
                            <div class="imagebook">
                                <img src="<?= BASEURL . '/public/img/book/' . $row['image'] ?>" alt="<?= $row['name'] ?>" width="150px" height="220px">
                                <div class="namebook">
                                    <h5><?= $row['name'] ?></h5>
                                    <h6>by <?= $row['publisher'] ?></h6>
                                </div>
                                <div class="bottombook">
                                    <div class="pricee">
                                        <h6 style="<?= $stockcolor ?>"><?= $stock ?></h6>
                                        <h5>Rp.<?= $row['price'] ?></h5>
                                    </div>
                                    <div class="btnbuystok">
                                        <button class="tbuy2" onclick="location.href='<?= BASEURL . '/admin/bookedit/' . $row['id_book'] ?>' ">Edit</button>
                                        <button class="tbuy2" onclick="location.href='<?= BASEURL . '/admin/bookaddstock/' . $row['id_book'] ?>' ">Stock</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                    <?php
                        endforeach;
                    ?>
                </div>
                <div class="cpr">
                    <p><i class="fa fa-instagram" style="font-size:24px"></i> Copyright @aditwchksr :v</p>
                </div>
            </div>
        </div>