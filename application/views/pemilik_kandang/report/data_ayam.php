<html>

<head>
    <meta charset="utf-8">
    <title>Laporan</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<center><h2>LAPORAN DATA AYAM</h2></center>
<table style="width:100%">
    <thead>
    <tr>
<<<<<<< HEAD
        <th>No</th>
        <th>Periode</th>
        <th>Umur</th>
        <th>Jml. Mati</th>
        <th>Jml.Pakan</th>
        <th>Berat Rata</th>
=======
        <th>Periode</th>
        <th>Umur</th>
        <th>Tanggal</th>
>>>>>>> dcc3e7e18a11072b4063a27e0b9f321b3f8cf50e
        <th>FCR</th>
        <th>Mortalitas</th>
        <th>Harga Jual</th>
        <th>IP</th>
    </tr>
    </thead>
    <tbody>
<<<<<<< HEAD
    <?php
    $no = 1;
    $total_mati = 0;
    $total_pakan = 0;
    foreach ($dataKandang->result() as $item) :
        $total_mati += $item->jml_mati;
        $total_pakan += $item->jml_pakan;
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $item->keterangan; ?></td>
            <td align="center"><?= $item->umur; ?></td>
            <td align="right"><?= $item->jml_mati; ?></td>
            <td align="right"><?= $item->jml_pakan; ?></td>
            <td align="right"><?= $item->berat_rata; ?></td>
            <td align="right"><?= $item->fcr; ?></td>
            <td align="right"><?= $item->mortalitas; ?></td>
            <td align="right"><?= $item->harga; ?></td>
            <td align="right"><?= $item->ip; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3">Total</td>
        <td align="right"><?= $total_mati; ?></td>
        <td align="right"><?= $total_pakan; ?></td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
    </tr>
    </tfoot>

    <label>Tanda Tangan Pemilik Kandang</label>
=======
    <?php foreach ($dataKandang->result() as $item) :?>
        <tr>
            <td><?= $item->keterangan; ?></td>
            <td><?= $item->umur; ?></td>
            <td><?= $item->tanggal; ?></td>
            <td><?= round($item->fcr, 2); ?></td>
            <td><?= $item->mortalitas; ?></td>
            <td><?= $item->harga; ?></td>
            <td><?= $item->ip; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
>>>>>>> dcc3e7e18a11072b4063a27e0b9f321b3f8cf50e
</table>

</body>
</html>