
        <div class="container1">
            <div class="main"> 
                <h1>History</h1>
                <table id="example" class="stripe" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Book</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no=1;
                            foreach($History as $row):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <img src= "<?= BASEURL . '/public/img/book/' . $row['image'] ?>" alt="<?= $row['book'] ?>" width="60px" height="100px">    
                            </td>
                            <td><?= $row['book'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['inserted_at'] ?></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
                <div class="cpr">
                    <p><i class="fa fa-instagram" style="font-size:24px"></i> Copyright @aditwchksr :v</p>
                </div>
            </div>
        </div>