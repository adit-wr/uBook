<?php
Message::flash();
?>
        <div class="container1">
            <div class="main"> 
                <h1>Book</h1>
                <div class="adbuk">
                    <button onclick="location.href='<?= BASEURL . '/librarian/bookinsert' ?>'" type="button" class="tadd "><span class="material-symbols-outlined">library_add</span>New Book</button>
                </div>
                <div class="mainbook">
                    <?php
                        $no=1;
                        foreach($AllBook as $row):
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
                                        <h6><?= $row['stock'] ?></h6>
                                        <h5>Rp.<?= $row['price'] ?></h5>
                                    </div>
                                    <button class="tbuy" onclick="location.href='<?= BASEURL . '/librarian/bookedit/' . $row['id_book'] ?>' ">Edit<span class="material-symbols-outlined">edit</span></button>
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