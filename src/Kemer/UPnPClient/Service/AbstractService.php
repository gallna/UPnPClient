<?php
namespace Kemer\UPnPClient\Service;

use Kemer\UPnP\DeviceDescription\ServiceList\Service;
use Kemer\UPnPClient\ProtocolInfo;
use Kemer\UPnP\Browse\Item;

class AbstractService implements ServiceInterface
{
    private $driver;
    private $description;

    public function __construct(Service $description, DriverInterface $driver)
    {
        $driver->setDescription($description);
        $this->setDriver($driver);
        $this->setDescription($description);
    }

    public function setDriver(DriverInterface $driver)
    {
        $this->driver = $driver;
        return $this;
    }

    public function getDriver()
    {
        return $this->driver;
    }

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
