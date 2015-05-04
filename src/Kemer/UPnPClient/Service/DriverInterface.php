<?php
namespace Kemer\UPnPClient\Service;

use Kemer\UPnP\DeviceDescription\ServiceList\Service;

interface DriverInterface
{
    public function setDescription(Service $description);

    public function getDescription();
}
