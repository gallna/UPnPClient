<?php
namespace Kemer\UPnPClient;

class ProtocolInfo
{
    private $protocolInfo;
    private $protocol;
    private $network;
    private $contentFormat;
    private $additionalInfo;
    private $protocols = [];

    public function __construct($protocolInfo = null)
    {
        if ($protocolInfo && is_string($protocolInfo)) {
            $this->fromString($protocolInfo);
        }
    }

    public function fromString($protocolInfo)
    {
        $protocols = [];
        foreach (explode(",", $protocolInfo) as $protocol) {
            $info = explode(":", $protocol);
            $protocol = new static();
            $protocol->setProtocol($info[0]);
            $protocol->setNetwork($info[1]);
            $protocol->setContentFormat($info[2]);
            $protocol->setAdditionalInfo($info[3]);
            $this->protocols[] = $protocol;
        }
    }

    public function toArray()
    {
        $array = [];
        foreach (explode(",", $this->protocolInfo) as $protocol) {
            $info = explode(":", $protocol);
            $array[] = [
                "protocol" => $info[0],
                "network" => $info[1],
                "contentFormat" => $info[2],
                "additionalInfo" => $info[3],
            ];
        }
        return $array;
    }

    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    public function getProtocol()
    {
        return $this->protocol;
    }

    public function setNetwork($network)
    {
        $this->network = $network;
        return $this;
    }

    public function getNetwork()
    {
        return $this->network;
    }

    public function setContentFormat($contentFormat)
    {
        $this->contentFormat = $contentFormat;
        return $this;
    }

    public function getContentFormat()
    {
        return $this->contentFormat;
    }

    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
        return $this;
    }

    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }
}
