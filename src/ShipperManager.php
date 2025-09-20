<?php

namespace Obelaw\Shippulse\Shipper;

use Obelaw\Shippulse\Shipper\Contracts\ShipmentDataInterface;
use Obelaw\Shippulse\Shipper\Contracts\ShippingProviderInterface;
use ReflectionClass;

class ShipperManager
{
    private static $shippers = [];

    public static function addShipper(string $name, $shipper)
    {
        self::$shippers[$name] = $shipper();
    }

    public static function getShippers()
    {
        return self::$shippers;
    }

    public static function getShipper(string $name)
    {
        if (!isset(self::$shippers[$name])) {
            throw new \Exception("Shipper {$name} not found.");
        }

        $reflectionClass = new ReflectionClass(self::$shippers[$name]);

        if (!$reflectionClass->implementsInterface(ShippingProviderInterface::class)) {
            throw new \Exception("Shipper {$name} must implement " . ShippingProviderInterface::class);
        }

        return self::$shippers[$name];
    }
}
