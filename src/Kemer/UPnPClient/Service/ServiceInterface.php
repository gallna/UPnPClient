<?php
namespace Kemer\UPnPClient\Service;

use Kemer\UPnP\DeviceDescription\ServiceList\Service;

interface ServiceInterface
{
    public function setDriver(DriverInterface $driver);

    public function getDriver();

    public function setDescription(Service $description);

    public function getDescription();
}
