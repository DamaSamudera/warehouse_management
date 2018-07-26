<table class="table table-hover" id="basicTable">
    <thead>
    <tr>
        <th style="width:1%; padding: 5px !important;" class="text-center">
            <button class="btn btn-link">
            </button>
        </th>
        <th style="width:79%">Product</th>
        <th style="width:21%">Counted Qty</th>
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
                <a data-toggle="close"
                   class="card-close text-danger remove_cart" href="#"
                   id="<?= $item["rowid"] ?>"><i
                    class="card-icon card-icon-close"></i></a>
                <input type="hidden" value="<?= $item["id"] ?>" name="id[]"/>
                <input type="hidden" value="<?= $item["rowid"] ?>" name="rowid[]"/>
            </div>
        </td>
        <td class="v-align-middle">
            <?= $item["name"] ?>
        </td>
        <td class="v-align-middle">
            <input type="number" class="form-control update_cart" value="<?= $item["qty"] ?>" name="qty[]" data-field="qty" data-id="<?= $item["rowid"] ?>"/>
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