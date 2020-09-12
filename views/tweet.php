<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Tweet</title>

    <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    </style>
</head>
<body>
    <table>
        <tr>
            <td>user</td>
            <td>Tweet</td>
            <td>Aksi</td>
        </tr>

        <tbody>
            <!-- Data akan ditampilkan disini nantinya -->
            <?php foreach($data as $d) { ?>
                <tr>
                    <td>
                        <?php echo $d->user ?>
                    </td>
                    <td>
                        <?php echo $d->tweet ?>
                    </td>
                    <td>
                        <button type="button">
                            Edit
                        </button>
                        <button>
                            Hapus
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>