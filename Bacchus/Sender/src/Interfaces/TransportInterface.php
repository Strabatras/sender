<?php
namespace Bacchus\Sender\Interfaces;

/**
 * Interface TransportInterface
 * @package Bacchus\Sender\Interfaces
 */
interface TransportInterface {
    public function getSettings() : SetingsTranspotInterface;
    public function setSettings( SetingsTranspotInterface $settings );
    public function execute();
}