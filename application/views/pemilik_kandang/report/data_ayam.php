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
        <th>Periode</th>
        <th>Umur</th>
        <th>Tanggal</th>
        <th>FCR</th>
        <th>Mortalitas</th>
        <th>Harga Jual</th>
        <th>IP</th>
    </tr>
    </thead>
    <tbody>
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
</table>

</body>
</html>