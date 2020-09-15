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
                        <?php if(isset($_SESSION['id_user'])) { ?>
                            <a href="<?php echo ProjectURL ?>/edit?id=<?php echo $d->id ?>">
                                <button type="button">
                                    Edit
                                </button>
                            </a>
                            
                            <a href="<?php echo ProjectURL ?>/delete?id=<?php echo $d->id ?>">
                                <button>
                                    Hapus
                                </button>
                            </a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>