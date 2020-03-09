<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Bill</th>
                <th>Model</th>
                <th>Imei/Serial</th>
                <th>Accessories</th>
                <th>Repiar Description</th>
                <th>Remark</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($detail_list as $key => $value) { ?>
            <tr>
                <td><?= $value['Dsub_Bill']?></td>
                <td><?= $value['Dsub_Model']?></td>
                <td><?= $value['Dsub_Imei']?></td>
                <td><?= $value['Dsub_Accessories']?></td>
                <td><?= $value['Dsub_Description']?></td>
                <td><?= $value['Dsub_Remark']?></td>
                <td><a class="btn btn-danger btn-sm text-white" href="<?= base_url('delivery_order/delete_delivery_order?ref_no='.$value['Deli_No'].'&id='.$value['Dsub_ID']);?>">Delete</a></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>