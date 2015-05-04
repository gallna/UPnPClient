<?php
namespace Kemer\UPnPClient\Device;

use Kemer\UPnP\Devices;
use Kemer\UPnP\Services;
use Kemer\UPnPClient\Service\RenderingControl;
use Kemer\UPnP\DeviceDescription\DeviceDescription;
use Kemer\UPnP\DescriptionFactory;

class MediaRenderer extends AbstractDevice
{
    protected $renderingControl;

    public function getRenderingControl($driver = null)
    {
        $driver = $driver ?: new RenderingControl\Driver\Soap();
        return new RenderingControl\RenderingControl(
            $this->getDescription()->getServiceList()->get(Services::RENDERING_CONTROL),
            $driver
        );
    }
}
