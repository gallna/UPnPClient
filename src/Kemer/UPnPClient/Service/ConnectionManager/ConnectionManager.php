<?php
namespace Kemer\UPnPClient\Service\ConnectionManager;

use Kemer\UPnPClient\ProtocolInfo;
use Kemer\UPnPClient\Service\AbstractService;

class ConnectionManager extends AbstractService
{
    public function getProtocolInfo()
    {
        $response = $this->getDriver()->GetProtocolInfo();
        return $info = new ProtocolInfo(empty($response["Source"]) ? $response["Sink"] : $response["Source"]);
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
        return $this->getDriver()->PrepareForConnection($remoteProtocolInfo, $peerConnectionManager, $peerConnectionID, $direction);
    }

    public function connectionComplete($connectionID = 0)
    {
        return $this->getDriver()->ConnectionComplete($connectionID);
    }

    public function getCurrentConnectionIDs()
    {
        return $this->getDriver()->GetCurrentConnectionIDs();
    }

    public function getCurrentConnectionInfo($connectionID)
    {
        return $this->getDriver()->GetCurrentConnectionInfo($connectionID);
    }
}
