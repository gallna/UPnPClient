<?php
namespace Kemer\UPnPClient;

use Kemer\UPnP\DeviceDescription\DeviceDescription;
use Kemer\UPnP\DeviceDescription\ServiceList\ServiceList;
use Kemer\UPnP\Services;
use Kemer\SSDP\Response\DiscoveryResponse;
use Kemer\UPnPClient\Device;
use Kemer\UPnP\Devices;

use Kemer\UPnP\DescriptionFactory;

class DeviceFactory
{
    protected $descriptionFactory;

    public function __construct(DescriptionFactory $descriptionFactory)
    {
        $this->descriptionFactory = $descriptionFactory;
    }

    public function createMediaServer(DiscoveryResponse $discovery)
    {
        $description = $this->descriptionFactory->createDeviceDescription($discovery);
        if ($description->getDeviceType() !== Devices::MEDIA_SERVER) {
            throw new \Exception("Wrong device");
        }
        return new Device\MediaServer($description, $this->descriptionFactory);
    }

    public function createMediaRenderer(DiscoveryResponse $discovery)
    {
        $description = $this->descriptionFactory->createDeviceDescription($discovery);
        if ($description->getDeviceType() !== Devices::MEDIA_RENDERER) {
            throw new \Exception("Wrong device");
        }
        return new Device\MediaRenderer($description, $this->descriptionFactory);
    }
}
