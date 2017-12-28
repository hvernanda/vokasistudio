<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<b> DATA TABUNGAN VOKASI STUDIOS </b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="table-responsive">
      <!-- minta tlg dibikin sortingnya ya -->
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jumlah</th>
                    <th>Tabungan</th>
                    <th>Cash</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <th>Jumlah</th>
                <th>Tabungan</th>
                <th>Cash</th>
              </tr>
              <?php foreach ($view as $row): ?>
              <tr>
                <td>Rp.<?= $row->jumlah; ?></td>
                <td>Rp.<?= $row->tabungan; ?></td>
                <td>Rp.<?= $row->cash; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-6 -->
</div>
<!-- /.row -->