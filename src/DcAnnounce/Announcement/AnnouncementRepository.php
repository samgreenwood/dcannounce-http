<?php namespace DcAnnounce\Announcement;

class AnnouncementRepository
{
    /**
     * @var \PDO
     */
    private $db;

    /**
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Get all the announcements from the database
     * @return array
     */
    public function getAll()
    {
        $announcements = [];

        $select = "SELECT * FROM announcements ORDER BY announced DESC";

        $statement = $this->db->prepare($select);

        $statement->execute();

        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($data as $row) {
            $announcements[] = new Announcement($row['site'], $row['filename'], $row['size'], $row['tth'], new\DateTime($row['announced']));
        }

        return $announcements;

    }

    /**
     * Save an announcement to the database
     *
     * @param Announcement $announcement
     * @return bool
     */
    public function save(Announcement $announcement)
    {

        $insert = "INSERT INTO announcements (site, filename, size, tth, announced)
                VALUES (:site, :filename, :size, :tth, :announced)";
        $statement = $this->db->prepare($insert);

        $statement->bindParam(':site', $announcement->getSite());
        $statement->bindParam(':filename', $announcement->getFilename());
        $statement->bindParam(':size', $announcement->getSize());
        $statement->bindParam(':tth', $announcement->getTth());
        $statement->bindParam(':announced', $announcement->getAnnounced()->format(\DateTime::ISO8601));

        return $statement->execute();

    }


}
