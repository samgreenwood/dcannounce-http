<?php

require '../vendor/autoload.php';

use Slim\Slim;
use DcAnnounce\Announcement\AnnouncementRepository;

$pdo = new PDO('sqlite:../dcannounce.sqlite');

$announcementRepository = new AnnouncementRepository($pdo);

$createTableIfNotExists = "CREATE TABLE IF NOT EXISTS announcements(
   id         INTEGER   PRIMARY KEY AUTOINCREMENT,
   site       TEXT      NOT NULL,
   filename   TEXT      NOT NULL,
   size       TEXT      NOT NULL,
   tth        TEXT      NOT NULL,
   announced  DATETIME      NOT NULL
);";

$pdo->prepare($createTableIfNotExists)->execute();

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

$app = new Slim(['templates.path' => '../templates']);

require 'routes.php';

$app->run();