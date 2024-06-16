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
                            <!-- <th>Price</th> -->
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Confirm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no=1;
                            foreach($AllHistory as $row):
                                $bgclr = '';
                                $dsble = '';
                                if ($row['status'] == 'proccess') {
                                    $bgclr = 'background-color: blue; color: white; padding:5px; border-radius:10px';
                                } else if ($row['status'] == 'expired') {
                                    $bgclr = 'background-color: red; color: white; padding:5px; border-radius:10px';
                                    $dsble = 'display: none;';
                                } else if ($row['status'] == 'done') {
                                    $bgclr = 'background-color: green; color: white; padding:5px; border-radius:10px';
                                    $dsble = 'display: none;';
                                }
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['username'] ?></td>
                            <td class="tdname"><?= $row['book'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <!-- <td>Rp. <?//= $row['price'] ?></td> -->
                            <td>Rp. <?= $row['totalprice'] ?></td>
                            <td><p style="<?= $bgclr; ?>"><?= $row['status'] ?></p></td>
                            <td><?= $row['inserted_at'] ?></td>
                            <td class="trbtn">
                                <form action="<?= BASEURL . '/librarian/buybookproccessed' ?>" method="post">
                                    <input type="hidden" name="id_hst" value="<?= $row['id_history'] ?>">
                                    <input type="hidden" name="book" value="<?= $row['book'] ?>">
                                    <input type="hidden" name="newstock" value="<?= $row['quantity'] ?>">
                                    <button class="btnacc" style="<?= $dsble ?>" type="submit"><span class="material-symbols-outlined">task_alt</span></button>
                                </form>
                                <form action="<?= BASEURL . '/librarian/buybookproccesscancel' ?>" method="post">
                                    <input type="hidden" name="id_hst" value="<?= $row['id_history'] ?>">
                                    <button class="btncancel" style="<?= $dsble; ?>"><span class="material-symbols-outlined">cancel</span></button>
                                </form>
                            </td>
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