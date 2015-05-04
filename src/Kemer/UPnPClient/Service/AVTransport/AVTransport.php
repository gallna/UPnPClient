<?php
namespace Kemer\UPnPClient\Service\AVTransport;

use Kemer\UPnP\Browse\Item;
use Kemer\UPnPClient\Service\AbstractService;

class AVTransport extends AbstractService
{
    public function play($instanceID = 0, $speed = 1)
    {
        return $this->getDriver()->Play($instanceID, $speed);
    }

    public function stop($instanceID = 0)
    {
        return $this->getDriver()->Stop($instanceID);
    }

    public function setAVTransportURI($instanceID = "0", $currentURI, $currentURIMetaData = [])
    {
        if ($currentURI instanceof Item) {
            $currentURI = $currentURI->getRes()[0];
        }
        return $this->getDriver()->SetAVTransportURI($instanceID, $currentURI, $currentURIMetaData);
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

    public function pause($instanceID = 0)
    {
        return $this->getDriver()->Pause($instanceID);
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
