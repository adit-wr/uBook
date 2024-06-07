<?php
Message::flash();
?>
        <div class="main addstock">
            <form id="form" action="<?= BASEURL . '/librarian/bookstockproccess' ?>" method="post">
                <input type="hidden" name="id" value="<?= $book['id_book'] ?>">
                <input type="hidden" name="name" value="<?= $book['name'] ?>">
                <h1>Add Stock</h1>
                <div class="imagebook">
                    <img src="<?= BASEURL . '/public/img/book/' . $book['image'] ?>" alt="<?= $book['name'] ?>" width="150px" height="220px">
                </div>
                <div class="forminputadd">
                    <button class="quantity btnmin" onclick="decreaseValue()" type="button"><span class="material-symbols-outlined">remove</span></button>
                    <input type="number" id="newstock" name="newstock" placeholder="Enter stock" autocomplete="off" value="1">
                    <button class="quantity btnplus" onclick="increaseValue()" type="button"><span class="material-symbols-outlined">add</span></button>
                </div>
                <div class="btnn">
                    <button onclick="location.href='<?= BASEURL . '/librarian/book' ?>'" type="button" class="btnsi">Cancel</button>
                    <button class="btnsi" name="addstock" type="submit">Submit</button>
                </div>
            </form>
        </div>
