<?php

/**
 * Show all the announcements in a list
 */
use DcAnnounce\Announcement\Announcement;

$app->get('/', function () use ($app, $announcementRepository) {
    $announcements = $announcementRepository->getAll();

    $app->render('announcements.php', compact('announcements'));
});

/**
 * Announce something new
 */
$app->post('/announce', function () use ($app, $announcementRepository) {

    $data = ['status' => 'ok'];

    $site = $app->request->post('site');
    $filename = $app->request->post('filename');
    $size = $app->request->post('size');
    $tth = $app->request->post('tth');

    if ($site && $filename && $size && $tth) {
        try {
            $announcement = Announcement::announce($site, $filename, $size, $tth);
            $announcementRepository->save($announcement);

            $magnet = sprintf("magnet:?xt=urn:tree:tiger:%s&xl=%s&dn=%s", $tth, $size, $filename);

            $announceString = addslashes(sprintf("[%s] %s - %s - %s", $site, $filename, humanFileSize($size), $magnet));
            $command = sprintf("echo '%s' | nc localhost 54321", $announceString);

            exec($command);

        } catch (Exception $e) {
            $data = ['status' => 'error'];
        }
    } else {
        $data = ['status' => 'data missing'];
    }

    $response = $app->response();
    $response->setBody(json_encode($data));
    $response->headers->set('Content-Type', 'application/json');
    $response->finalize();

});

function humanFileSize($size)
{
    if ($size >= 1073741824) {
        $fileSize = round($size / 1024 / 1024 / 1024, 1) . 'GB';
    } elseif ($size >= 1048576) {
        $fileSize = round($size / 1024 / 1024, 1) . 'MB';
    } elseif ($size >= 1024) {
        $fileSize = round($size / 1024, 1) . 'KB';
    } else {
        $fileSize = $size . ' bytes';
    }
    return $fileSize;
}