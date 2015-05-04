<?php
namespace Kemer\UPnPClient\Service\ContentDirectory\Driver;

use Kemer\UPnP\DeviceDescription\ServiceList\Service;
use Kemer\UPnPClient\Service\AbstractSoapDriver;

class Soap extends AbstractSoapDriver
{
    public function browse($objectID = '0', $browseflag = 'BrowseDirectChildren', $start = 0, $count = 0, $key = 1)
    {
        try {
            $response = $this->getService()->__soapCall("Browse",
                    array(
                        new \SoapParam($objectID, 'ObjectID'),
                        new \SoapParam($browseflag, 'BrowseFlag'),
                        new \SoapParam('*', 'Filter'),
                        new \SoapParam($start, 'StartingIndex'),
                        new \SoapParam($count, 'RequestedCount'),
                        new \SoapParam('', 'SortCriteria'),
                        )
                    );
            return $response;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getSearchCapabilities()
    {
        return $response = $this->service->__soapCall("GetSearchCapabilities", []);
    }

    public function getSortCapabilities()
    {
        return $response = $this->service->__soapCall("GetSortCapabilities", []);
    }

    public function GetSystemUpdateID()
    {

    }
}
