<?php

namespace Obelaw\Shippulse\Shipper\Contracts;

use Obelaw\Shippulse\Shipper\Contracts\ShipmentDataInterface;

interface ShippingProviderInterface
{
    public function createShipment(ShipmentDataInterface $data);

    public function trackShipment($shipmentId);

    public function labelShipment($shipmentId);

    public function cancelShipment($shipmentId);
}
