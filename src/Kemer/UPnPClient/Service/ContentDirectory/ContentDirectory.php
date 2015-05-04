<?php
namespace Kemer\UPnPClient\Service\ContentDirectory;

use Kemer\UPnP\Browse\Container;
use Kemer\UPnP\Browse\Item;
use Kemer\UPnPClient\Service\AbstractService;

class ContentDirectory extends AbstractService
{
    public function browse($objectID = '0', $browseflag = 'BrowseDirectChildren', $start = 0, $count = 0, $key = 1)
    {
        if ($objectID instanceof Container) {
            $id = $objectID->getId();
        } elseif (is_string($objectID) || is_integer($objectID)) {
            $id = $objectID;
        } else {
            throw new \Exception(sprintf("Invalid object id with type: %s", gettype($objectID)));
        }
        try {
            $response = $this->getDriver()->browse($objectID, $browseflag, $start, $count, $key);
            $xml = new \SimpleXMLIterator($response["Result"]);
        } catch (\Exception $e) {
            var_dump($e);
            throw $e;
        }
        $response = [];
        foreach ($xml as $key => $element) {
            if ($key == 'item') {
                $item = new Item(
                    (string)$element->attributes()["id"],
                    $element->children('upnp', true)['class']);
                $item->setTitle((string)$element->children('dc', true)->title);
                foreach($element->res as $res) {
                    $item->addRes((string)$res);
                }

                $response[] = $item;
            } elseif($key == 'container') {
                $container = new Container(
                    (string)$element->attributes()["id"],
                    $element->children('upnp', true)['class']);
                $container->setTitle((string)$element->children('dc', true)->title);
                $response[] = $container;
            }

        }
        return $response;
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
