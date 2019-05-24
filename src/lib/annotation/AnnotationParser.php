<?php

namespace wor\lib\annotation;

/**
 * Class AnnotationParser
 * - @Anno(key=val)형태로 값을 파싱
 *
 * @package wor\lib\annotation
 */
class AnnotationParser
{
    private $pattern = "";


    
    
    public function parse(string $annotation)
    {
        #여기서 annotationDoc 문자열을 그대로 가져오도록해서
        # 어노테이션 이름이름 판별
        # $anno = AnnotationFactory($annoName)
        # $anno->run($classNamef); 얘뜰아~~~~ 워어어어훠`~~ 얟들아~~~ 워허허허허
        #
        $annotation->run();



        #return을
        # 흠.. Annotation 속성(key val) 이런 식으로 바환?

    }







}