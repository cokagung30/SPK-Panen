<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <style>
        #table_data, .table_head, .table_ini {
            border: 1px solid black;
            border-collapse: collapse;
            margin: 50px;
        }
    </style>
</head>

<body>
<h2 style="text-align: center">Laporan Persetujuan Panen</h2>
<center>
    <table id="table_data" width="100%">
        <?php foreach ($sql1 as $item) : ?>
            <tr>
                <th class="table_head" width="40">Nama Kandang</th>
                <td colspan="2" class="table_ini" width="60" style="text-align: center">
                    <?= $item->nama_kandang; ?>
                </td>
            </tr>
            <tr>
                <th style="word-wrap: break-word" class="table_head" width="40">Nama Pemilik Kandang</th>
                <td colspan="2" class="table_ini" width="60" style="text-align: center">
                    <?= $item->nama_pemilik_kandang; ?>
                </td>
            </tr>
            <tr>
                <th rowspan="7" class="table_head" width="40">Kriteria Ayam</th>
                <th class="table_head" width="20">
                    Periode
                </th>
                <td class="table_ini" width="40" align="center"><?= $item->keterangan; ?></td>
            </tr>
            <tr>
                <th class="table_head" width="20">
                    Umur
                </th>
                <td class="table_ini" width="40"><?= $item->umur; ?></td>
            </tr>
            <tr>
                <th class="table_head" width="20">
                    FCR
                </th>
                <td class="table_ini" width="40"><?= $item->fcr; ?></td>
            </tr>
            <tr>
                <th class="table_head" width="20">
                    Mortalitas
                </th>
                <td class="table_ini" width="40"><?= $item->mortalitas; ?></td>
            </tr>
            <tr>
                <th class="table_head" width="20">
                    Harga Jual
                </th>
                <td class="table_ini" width="40"><?= $item->harga; ?></td>
            </tr>
            <tr>
                <th class="table_head" width="20">
                    IP
                </th>
                <td class="table_ini" width="40"><?= $item->ip; ?></td>
            </tr>
            <tr>
                <th class="table_head" width="20">
                    Status
                </th>
                <td class="table_ini" width="40"><?= $item->status; ?></td>
            </tr>
            <tr>
                <th class="table_head" width="40">
                    Keteranngan
                </th>
                <td colspan="2" class="table_ini" width="60">
                    <?= ($item->status_pengajuan == '2')? "Setuju":"Tidak Setuju"; ?>
                </td>
            </tr>
            <tr>
                <th class="table_head" width="40">
                    Catataan
                </th>
                <td colspan="2" class="table_ini" width="60"><?= $item->catatan; ?></td>
            </tr>

    </table>
</center>

<table width="100%">
    <td width="150"></td>
    <td width="20" align="right">
        <div style="text-align: center">
            <div style="margin-top: 50px">TTD</div>
            <div style="margin-top: 100px"><?= $item->nama_ppl; ?></div>
        </div>

    </td>
</table>
<?php endforeach; ?>
</body>
</html>