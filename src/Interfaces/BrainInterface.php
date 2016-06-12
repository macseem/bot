<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 6/12/16
 * Time: 7:09 PM
 */

namespace Bot\Interfaces;


interface BrainInterface
{
    public function input($signal);
    
    public function output($signal);
}