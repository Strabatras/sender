<?php
namespace Bacchus\Sender\Response;


class HeadersResponse {
    private $httpCode = null;
    private $contentType = null;
    /**
     * Возвращает http код ответа
     * @return int|null
     */
    public function getHttpCode() :? int {
        return $this->httpCode;
    }
    /**
     * Устанавливает http код ответа
     * @param int $httpCode
     * @return $this
     */
    public function setHttpCode( int $httpCode )
    {
        $this->httpCode = $httpCode;
        return $this;
    }
    /**
     * Возвращает тип контента
     * @return string|null
     */
    public function getContentType() :? string {
        return $this->contentType;
    }
    /**
     * Устанавливает тип контента
     * @param string $contentType
     * @return $this
     */
    public function setContentType( string $contentType ) {
        $this->contentType = $contentType;
        return $this;
    }
}