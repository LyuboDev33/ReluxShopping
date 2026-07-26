<?php

namespace App\Constants;

class PrescriptionOptions
{
    /**
     * All these constants are used when adding a product
     * and selecting the customer's prescription.
     */


    /**
     * Sphere values (SPH)
     */
    public static function SPH(): array
    {
        return array_map(function ($value) {
            return number_format($value, 2, '.', '');
        }, range(-4, 4, 0.25));
    }


    /**
     * Cylinder values (CYL)
     */
    public static function CYL(): array
    {
        return array_map(function ($value) {
            return number_format($value, 2, '.');
        }, range(-2, 2, 0.25));
    }


    /**
     * PD Values
     */
    public static function PD(): array
    {
        return range(45, 80);
    }

    /**
     * Axis values (1-180)
     */
    public static function axis(): array
    {
        return range(1, 180);
    }
}
