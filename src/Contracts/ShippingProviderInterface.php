<?php

namespace Obelaw\Shippulse\Shipper\Contracts;

use Obelaw\Shippulse\Shipper\Contracts\ShipmentDataInterface;

interface ShippingProviderInterface
{
    public function createShipment(ShipmentDataInterface $data);
}
