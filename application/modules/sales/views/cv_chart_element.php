<table class="table table-hover" id="basicTable">
    <thead>
    <tr>
        <th style="width:1%; padding: 0px !important;" class="text-center">
            <button class="btn btn-link">
            </button>
        </th>
        <th style="width:24%">Barang</th>
        <th style="width:15%">Price</th>
        <th style="width:15%">Qty</th>
        <th style="width:15%">Discount</th>
        <th style="width:15%">Sub Total</th>
        <th style="width:15%">SC</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $count = 0;
        foreach($items as $item):
            $count++;
    ?>
            <tr>
                <td class="v-align-middle">
                    <div class="text-center">
                        <a data-toggle="close" class="card-close text-danger remove_cart" href="#" id="<?= $item["rowid"] ?>"><i class="card-icon card-icon-close"></i></a>
                        <input type="hidden" value="<?= $item["id"] ?>" name="id[]"/>
                        <input type="hidden" value="<?= $item["rowid"] ?>" name="rowid[]"/>
                    </div>
                </td>
                <td class="v-align-middle ">
                    <?= $item["name"] ?>
                </td>
                <td class="v-align-middle">
                    <?= to_rupiah($item["price"]) ?>
                </td>
                <td class="v-align-middle">
                        <input type="number" class="form-control update_cart" value="<?= $item["qty"] ?>" name="qty[]" data-field="qty" data-id="<?= $item["rowid"] ?>"/>
                </td>
                <td class="v-align-middle">
                    <input type="text" data-a-sign="Rp " data-a-dec="," data-a-sep="." class="autonumeric form-control update_cart" value="<?= $item["disc"] ?>" name="disc[]" data-field="disc" data-id="<?= $item["rowid"] ?>"/>
                </td>
                <td class="v-align-middle">
                    <?= to_rupiah(kalkulasi_sub_total_item($item)); ?>
                </td>
                <td class="v-align-middle">
                    <input type="text" class="form-control update_cart" value="<?= $item["sc"] ?>" name="sc[]" data-field="sc" data-id="<?= $item["rowid"] ?>"/>
                </td>
            </tr>
    <?php
        endforeach;

    if($count == 0)
    {
        echo '<tr><td class="v-align-middle text-center" colspan="7">Cart is Empty</td></tr>';
    }
    ?>
    </tbody>
</table>
