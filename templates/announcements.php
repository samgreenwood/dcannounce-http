
<!DOCTYPE html>
<html lang="en">
<head>
    <title>DcAnnounce</title>

    <link rel="stylesheet" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>

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
                    <th>Announced</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($announcements as $announcement) { ?>
                <tr>
                    <td><?=$announcement->getFilename()?></td>
                    <td><?=$announcement->getSite()?></td>
                    <td><?=humanFileSize($announcement->getSize())?></td>
                    <td><?=$announcement->getTTH()?> <a href="<?=$announcement->getMagnet()?>"><i class="fa fa-magnet"></i></td>
                    <td><?=$announcement->getAnnounced()->format('d/m/y h:i:s')?></td>
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
