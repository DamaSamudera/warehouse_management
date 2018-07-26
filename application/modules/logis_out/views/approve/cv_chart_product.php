<table class="table table-hover" id="basicTable">
    <thead>
    <tr>
        <th style="width:17%">Barcode</th>
        <th style="width:17%">Name</th>
        <th style="width:25%">Cost</th>
        <th style="width:15%">Counted Qty</th>
        <th style="width:30%">Subtotal</th>
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
                <?= $item["barcode"] ?>
                <input type="hidden" value="<?= $item["id"] ?>" name="id[]"/>
                <input type="hidden" value="<?= $item["rowid"] ?>" name="rowid[]"/>
            </td>
            <td class="v-align-middle">
                <?= $item["name"] ?>
            </td>
            <td class="v-align-middle">
                <?= to_rupiah($item["price"]) ?>
            </td>
            <td class="v-align-middle">
                <input type="number" class="form-control update_cart" value="<?= $item["qty"] ?>" name="qty[]" data-field="qty" data-id="<?= $item["rowid"] ?>"/>
            </td>
            <td class="v-align-middle">
                <input type="text" class="form-control text-black" value="<?= to_rupiah($item['subtotal']) ?>" readonly>
            </td>
        </tr>
    <?php
    endforeach;

    if($count == 0)
    {
        echo '<tr><td class="v-align-middle text-center" colspan="3">Cart is Empty</td></tr>';
    }
    ?>
    </tbody>
</table>