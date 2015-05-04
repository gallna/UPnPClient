<?php
namespace Kemer\UPnPClient\Service;

use Kemer\UPnP\DeviceDescription\ServiceList\Service;
use Kemer\UPnPClient\Service\DriverInterface;

abstract class AbstractDriver implements DriverInterface
{
    private $description;

    public function setDescription(Service $description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
