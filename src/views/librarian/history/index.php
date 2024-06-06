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
                            <th>Username</th>
                            <th>Book</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no=1;
                            foreach($AllHistory as $row):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['username'] ?></td>
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