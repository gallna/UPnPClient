<?php
namespace Kemer\UPnPClient\Device;

use Kemer\UPnP\Devices;
use Kemer\UPnP\Services;
use Kemer\UPnPClient\Service\ContentDirectory;
use Kemer\UPnP\DeviceDescription\DeviceDescription;
use Kemer\UPnP\DescriptionFactory;

class MediaServer extends AbstractDevice
{
    protected $contentDirectory;

    public function getContentDirectory($driver = null)
    {
        $driver = $driver ?: new ContentDirectory\Driver\Soap();
        return new ContentDirectory\ContentDirectory(
            $this->getDescription()->getServiceList()->get(Services::CONTENT_DIRECTORY),
            $driver
        );
    }
}
