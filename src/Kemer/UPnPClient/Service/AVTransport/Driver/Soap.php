<?php
namespace Kemer\UPnPClient\Service\AVTransport\Driver;

use Kemer\UPnP\DeviceDescription\ServiceList\Service;
use Kemer\UPnPClient\Service\AbstractSoapDriver;

class Soap extends AbstractSoapDriver
{
    public function setAVTransportURI($instanceID = "0", $currentURI, $currentURIMetaData = [])
    {
        return $this->getService()->__soapCall("SetAVTransportURI",
            [
                new \SoapParam($instanceID, 'InstanceID'),
                new \SoapParam($currentURI, 'CurrentURI'),
                new \SoapParam($currentURIMetaData, 'CurrentURIMetaData')
            ]
        );
    }

    public function SetNextAVTransportURI()
    {

    }

    public function GetMediaInfo()
    {

    }

    public function GetTransportInfo()
    {

    }

    public function GetPositionInfo()
    {

    }

    public function GetDeviceCapabilities()
    {

    }

    public function GetTransportSettings()
    {

    }

    public function stop($instanceID)
    {
        return $this->getService()->__soapCall("Stop",
            [
                new \SoapParam($instanceID, 'InstanceID')
            ]
        );
    }

    public function play($instanceID, $speed)
    {
        return $this->getService()->__soapCall("Play",
            [
                new \SoapParam($instanceID, 'InstanceID'),
                new \SoapParam($speed, 'Speed')
            ]
        );
        var_dump($response);
    }

    public function Pause($instanceID)
    {
        return $this->getService()->__soapCall("Pause",
            [
                new \SoapParam($instanceID, 'InstanceID')
            ]
        );
    }

    public function Record()
    {

    }

    public function Seek()
    {

    }

    public function Next()
    {

    }

    public function Previous()
    {

    }

    public function SetPlayMode()
    {

    }

    public function SetRecordQualityMode()
    {

    }

    public function GetCurrentTransportActions()
    {

    }
}
