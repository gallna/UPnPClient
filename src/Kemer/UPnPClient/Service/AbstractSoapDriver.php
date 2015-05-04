<?php
namespace Kemer\UPnPClient\Service;

use Kemer\UPnP\DeviceDescription\ServiceList\Service;
use Kemer\UPnPClient\Service\AbstractDriver;

abstract class AbstractSoapDriver extends AbstractDriver
{
    private $service;

    public function setService(\SoapClient $service)
    {
        $this->service = $service;
        return $this;
    }

    protected function getService()
    {
        if (!$this->service) {
            if (!$this->getDescription()) {
                throw new \Exception("No service description set");
            }
            $this->setService(
                new \SoapClient(
                    null,
                    [
                        'soap_version' => SOAP_1_1,
                        'location' => $this->getDescription()->getControlURL(),
                        'uri' => $this->getDescription()->getServiceType(),
                        "trace" => true
                    ]
                )
            );
        }
        return $this->service;
    }
}
