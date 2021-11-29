<h2>Laporan Pembayaran</h2>

<div style="display: inline-block;">
  <form method="POST">
    <label>Tampilkan data dari tgl.</label> 
    <input type="date" name="tgl_awal">
    <label>sampai tgl.</label>
    <input type="date" name="tgl_akhir">
    <input type="submit" name="tampil" value="Tampilkan">
  </form>
</div>
<div style="display: inline-block;">
  <form action="export.php" method="POST" id="convert_form">
    <input type="hidden" name="file_content" id="file_content">
    <button type="submit" name="convert" id="convert">Convert</button>
  </form>
</div>


<br/><br/>
<table border="1" id="table_content">
  <tr>
    <th>No.</th>
    <th>NISN</th>
    <th>Tgl. Bayar</th>
    <th>Nominal</th>
  </tr>


  <?php
  if (isset($_POST['tampil'])) {
    $date1 = $_POST['tgl_awal'];
    $date2 = $_POST['tgl_akhir'];

    $data = $admin->getDataPembayaranPerPeriode($date1, $date2); // akan muncul error karena belum dibuat

    $no = 1;
    $total = 0;
    foreach ($data as $r):
      ?>

      <tr>
        <td><?= $no++ ?></td>
        <td><?= $r['nisn'] ?></td>
        <td><?= $r['tgl_bayar'] ?></td>
        <td><?= $r['nominal'] ?></td>
      </tr>

      <?php
      $total += $r['nominal'];
    endforeach;

  } else {
    echo "<tr><td colspan='4'><center>Tidak ada data</center></td></tr>";
  }
  ?>

</table>

<!-- pastikan kamu sedang online -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
 $(document).ready(function() {
  $('#convert').click(function() {
   var table_content = '<table>';
   table_content += $('#table_content').html();
   table_content += '</table>';
   $('#file_content').val(table_content);
   $('#convert_form').html();
  });
 });
</script> 