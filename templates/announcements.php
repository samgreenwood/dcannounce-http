
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>DcAnnounce</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- Begin page content -->
<div class="container">
    <div class="page-header">
        <h1>DCAnnounce</h1>
    </div>
    <div class="page-content">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Filename</th>
                    <th>Site</th>
                    <th>Size</th>
                    <th>TTH</th>
                    <th>Magnet</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($announcements as $announcement) { ?>
                <tr>
                    <td><?=$announcement->getFilename()?></td>
                    <td><?=$announcement->getSite()?></td>
                    <td><?=$announcement->getSize()?></td>
                    <td><?=$announcement->getTTH()?></td>
                    <td><?=$announcement->getTTH()?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<footer class="footer">
    <div class="container">
    </div>
</footer>


</body>
</html>
