<?php
namespace Bacchus\Sender;

use SplFileInfo;

/**
 * Class Autoloader
 * @package Bacchus\Sender
 */
class Autoloader {

    private $nameSpaceMapping = [];

    /**
     * Регистрирует заданную функцию в качестве реализации метода
     */
    public function splAutoloadRegister() {
        spl_autoload_register( [ $this, 'loadClass' ] );
    }

    /**
     * Функция, реализующая метод spl_autoload()
     * @param string $class
     */
    protected function loadClass( string $class ){
        $nameSpaceMapping = $this->nameSpaceMapping();
        if ( key_exists( $class, $nameSpaceMapping ) ) {
            require_once( $nameSpaceMapping[ $class ] );
        }
    }

    /**
     * Заполняет массив соответствий неймспейсов и путей файлов классов
     * @param string $nameSpace неймспейс
     * @param string $path стартовая директория
     */
    protected function fillNameSpaceMapping( string $nameSpace, string $path ){
        $scanned = array_diff( scandir( $path ), [ '..', '.' ] );
        foreach ( $scanned AS $row ) {
            $fileInfo = new SplFileInfo( $path . DIRECTORY_SEPARATOR . $row );
            if ( $fileInfo->isDir() ) {
                $this->fillNameSpaceMapping( $nameSpace . '\\' . $row, $path . DIRECTORY_SEPARATOR . $row );
            } elseif ( strtolower( $fileInfo->getExtension() ) === 'php' ) {
                $this->nameSpaceMapping[ $nameSpace . '\\' . $fileInfo->getBasename('.' . $fileInfo->getExtension() ) ] = $fileInfo->getPathname();
            }
        }
    }

    /**
     * Массив соответствий неймспейсов и путей файлов классов
     * @return array
     */
    protected function nameSpaceMapping() : array {
        return $this->nameSpaceMapping;
    }

    /**
     * Соответствие неймспейса и стартовой директории
     * @param string $nameSpace неймспейс
     * @param string $path стартовая директория
     */
    public function nameSpaceRegister( string $nameSpace, string $path ){
        $this->fillNameSpaceMapping( $nameSpace, $path );
    }

}