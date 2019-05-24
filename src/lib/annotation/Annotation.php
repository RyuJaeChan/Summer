<?php

namespace wor\lib\annotation;

class Annotation
{
    private $properties = array();


    final private function parse($str)
    {
        # 여기서 reflection->getDoc으로 가져온 문자열을 가지고 properties를 추출한다...?
        

    }

    protected function getProperties()
    {
        return $this->properties;
    }
}