<?php
namespace Kemer\UPnPClient\Device;

use Kemer\UPnP\Services;
use Kemer\UPnP\DescriptionFactory;
use Kemer\UPnP\DeviceDescription\DeviceDescription;
use Kemer\UPnPClient\Service\ConnectionManager;
use Kemer\UPnPClient\Service\AVTransport;

abstract class AbstractDevice
{
    protected $deviceDescription;
    protected $connectionManager;
    protected $avTransport;
    protected $descriptionFactory;

    public function __construct(DeviceDescription $description, DescriptionFactory $descriptionFactory)
    {
        $this->setDescription($description);
        $this->descriptionFactory = $descriptionFactory;
    }

    public function setDescription(DeviceDescription $deviceDescription)
    {
        $this->deviceDescription = $deviceDescription;
    }

    public function getDescription()
    {
        return $this->deviceDescription;
    }

    public function getConnectionManager($driver = null)
    {
        $driver = $driver ?: new ConnectionManager\Driver\Soap();
        return new ConnectionManager\ConnectionManager(
            $this->getDescription()->getServiceList()->get(Services::CONNECTION_MANAGER),
            $driver
        );
        return new ConnectionManager($this->getService($this->connectionManager));
    }

    public function getAvTransport($driver = null)
    {
        $driver = $driver ?: new AVTransport\Driver\Soap();
        return new AVTransport\AVTransport(
            $this->getDescription()->getServiceList()->get(Services::AV_TRANSPORT),
            $driver
        );
    }
}
