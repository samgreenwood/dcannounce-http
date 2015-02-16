<?php namespace DcAnnounce\Announcement;

class Announcement implements \JsonSerializable
{
    private $site;
    private $filename;
    private $size;
    private $tth;
    private $announced;

    /**
     * @param $site
     * @param $filename
     * @param $size
     * @param $tth
     */
    public function __construct($site, $filename, $size, $tth, \Datetime $announced)
    {
        $this->site = $site;
        $this->filename = $filename;
        $this->size = $size;
        $this->tth = $tth;
        $this->announced = $announced;
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
        return new static($site, $filename, $size, $tth, new \DateTime('now'));
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

    /**
     * @return \Datetime
     */
    public function getAnnounced()
    {
        return $this->announced;
    }


    /**
     * @return string
     */
    public function getMagnet()
    {
        return sprintf("magnet:?xt=urn:tree:tiger:%s&xl=%s&dn=%s", $this->tth, $this->size, urlencode($this->filename));
    }


    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    function jsonSerialize()
    {
        return [
            'filename' => $this->getFilename(),
            'site' => $this->getSite(),
            'size' => $this->getSize(),
            'magnet' => $this->getMagnet(),
        ];

    }
}