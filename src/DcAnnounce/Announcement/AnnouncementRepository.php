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

        $select = "SELECT * from Announcements";

        $statement = $this->db->prepare($select);
        $data = $statement->fetchAll();

        foreach($data as $row)
        {
            var_dump($row);die;
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

        $insert = "INSERT INTO announcements (site, filename, size, tth)
                VALUES (:site, :filename, :size, :tth) ";
        $statement = $this->db->prepare($insert);

        $statement->bindParam(':site', $announcement->getSite());
        $statement->bindParam(':filename', $announcement->getFilename());
        $statement->bindParam(':size', $announcement->getSize());
        $statement->bindParam(':tth', $announcement->getTth());

        return $statement->execute();

    }


}
