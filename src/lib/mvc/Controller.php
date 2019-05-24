<?php

namespace wor\lib\mvc;

use wor\lib\router\RequestContext;

/**
 * Class Controller
 *  - Controller 정의를 위한 상위 클래스
 *
 * @package wor\lib\mvc
 */
abstract class Controller
{
    private $reqContext;

    /**
     * Controller constructor.
     * - 자식 클래스에서 생성자 호출 방지
     */
    final public function __construct()
    {
    }

    /**
     * - request context 반환
     *
     * @return RequestContext
     */
    protected function getRequestContext()
    {
        return $this->reqContext;
    }

    public function setRequestContext($reqContext)
    {
        $this->reqContext = $reqContext;
    }
}
