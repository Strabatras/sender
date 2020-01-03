<?php
namespace Bacchus\Sender;

use Bacchus\Sender\Interfaces\TransportInterface;
use Bacchus\Sender\Interfaces\SetingsTranspotInterface;
use Bacchus\Sender\Transports\Curl;
use Bacchus\Sender\Transports\SettingsTransport;

class Sender {

    private $transport = null;
    private $setingsTranspot = null;

    protected function transport() :TransportInterface {
        if ( $this->transport === null ) {
            $this->transport = new Curl();
        }
        return $this->transport;
    }

    /**
     * Возвращает транспорт
     * @return TransportInterface
     */
    public function getTransport() :TransportInterface {
        return $this->transport();
    }

    /**
     * Устанавливает транспорт
     * @param TransportInterface $transport
     * @return $this
     */
    public function setTransport( TransportInterface $transport ) {
        $this->transport = $transport;
        return $this;
    }

    /**
     * Возвращает настройки транспорта
     * @return SetingsTranspotInterface
     */
    public function getSetingsTranspot() :SetingsTranspotInterface {
        return $this->transport()->getSettings();
    }

    /**
     * Устанавливает настройки транспорта
     * @param SetingsTranspotInterface $setingsTranspot
     * @return $this
     */
    public function setSetingsTranspot( SetingsTranspotInterface $setingsTranspot ) {
        $this->setingsTranspot = $setingsTranspot;
        return $this;
    }

    public function execute(){
        $transport = $this->transport();
        if ( $this->setingsTranspot ) {
            $transport->setSettings( $this->setingsTranspot );
        }
        $transport->execute();
    }

}