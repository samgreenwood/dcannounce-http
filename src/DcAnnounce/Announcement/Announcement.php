<?php namespace DcAnnounce\Announcement;

class Announcement
{
    private $site;
    private $filename;
    private $size;
    private $tth;

    /**
     * @param $site
     * @param $filename
     * @param $size
     * @param $tth
     */
    public function __construct($site, $filename, $size, $tth)
    {
        $this->site = $site;
        $this->filename = $filename;
        $this->size = $size;
        $this->tth = $tth;
    }

    /**
     * @param $site
     * @param $filename
     * @param $size
     * @param $tth
     * @return static
     */
    public static function announce($site, $filename, $size, $tth)
    {
        return new static($site, $filename, $size, $tth);
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getTth()
    {
        return $this->tth;
    }


}