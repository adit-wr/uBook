<?php
Message::flash();
?>
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
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no=1;
                            foreach($History as $row):
                                $bgclr = '';
                                if ($row['status'] == 'proccess') {
                                    $bgclr = 'background-color: blue; color: white; padding:5px; border-radius:10px';
                                } else if ($row['status'] == 'expired') {
                                    $bgclr = 'background-color: red; color: white; padding:5px; border-radius:10px';
                                } else if ($row['status'] == 'done') {
                                    $bgclr = 'background-color: green; color: white; padding:5px; border-radius:10px';
                                }
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <img src= "<?= BASEURL . '/public/img/book/' . $row['image'] ?>" alt="<?= $row['book'] ?>" width="60px" height="100px">    
                            </td>
                            <td class="tdname"><?= $row['book'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td>Rp. <?= $row['price'] ?></td>
                            <td>Rp. <?= $row['totalprice'] ?></td>
                            <td><p style="<?= $bgclr; ?>"><?= $row['status'] ?></p></td>
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