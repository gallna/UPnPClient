<?php
namespace Kemer\UPnPClient\Service\ConnectionManager\Driver;

use Kemer\UPnP\DeviceDescription\ServiceList\Service;
use Kemer\UPnPClient\Service\AbstractSoapDriver;

class Soap extends AbstractSoapDriver
{
    public function getProtocolInfo()
    {
        return $this->getService()->GetProtocolInfo();
    }

    /**
     * [prepareForConnection description]
     * @param  [type] $remoteProtocolInfo    [description]
     * @param  [type] $peerConnectionManager UDN/Service-Id
     * @param  [type] $peerConnectionID      [description]
     * @param  [type] $direction             'Output' or 'Input'
     * @return [type]                        [description]
     */
    public function prepareForConnection($remoteProtocolInfo, $peerConnectionManager, $peerConnectionID, $direction)
    {
        return $this->getService()->__soapCall("PrepareForConnection",
            [
                new \SoapParam($remoteProtocolInfo, 'RemoteProtocolInfo'),
                new \SoapParam($peerConnectionManager, 'PeerConnectionManager'),
                new \SoapParam($peerConnectionID, 'PeerConnectionID'),
                new \SoapParam($direction, 'Direction'),
            ]
        );
    }

    public function ConnectionComplete($connectionID)
    {
        return $this->getService()->__soapCall("ConnectionComplete",
            [
                new \SoapParam($connectionID, 'ConnectionID'),
            ]
        );
    }

    public function GetCurrentConnectionIDs()
    {
        return $this->getService()->__soapCall("GetCurrentConnectionIDs", []);
    }

    public function GetCurrentConnectionInfo($connectionID)
    {
        return $this->getService()->__soapCall("GetCurrentConnectionInfo",
            [
                new \SoapParam($connectionID, 'ConnectionID'),
            ]
        );
    }
}
