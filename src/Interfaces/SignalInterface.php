<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 6/12/16
 * Time: 7:11 PM
 */

namespace Bot\Interfaces;


interface SignalInterface
{
    public function getPower();

    public function getValue();
}