<?php

namespace wor\lib\mvc;

use wor\lib\exception\ServerException;

/**
 * Class Entity
 * - 해당 클래스를 상속받은 엔티티 클래스의 멤버 변수는
 *   반드시 carmel case로 작성해야 한다.
 * - 또한 모든 멤버 변수에 대한 getter/setter를 생성해야 한다.
 */
class Entity implements \JsonSerializable
{
    /**
     * - SELECT하여 얻은 row의 값을 Entity의 멤버에 저장
     *
     * @param string $key   row의 column
     * @param string $value row의 value
     *
     * @throws \ReflectionException
     */
    public function setColmValue(string $key, string $value)
    {
        $reflectionClass = new \ReflectionClass($this);
        $reflectionClass
            ->getMethod("set" . self::camelize($key))
            ->invoke($this, $value);
    }

    /**
     * - snake case를 Pascal case 형태로 변환
     *
     * @param string $input     변환할 문자열
     * @param string $separator 구분자
     *
     * @return mixed
     */
    private function camelize($input, $separator = '_')
    {
        return str_replace($separator, '', ucwords($input, $separator));
    }

    /**
     * - \JsonSerializable 상속 메서드
     * - Json 형태 배열 반환
     *
     * @return array|mixed
     * @throws \ReflectionException
     */
    public function jsonSerialize()
    {
        $reflectionClass = new \ReflectionClass($this);

        $pros = $reflectionClass->getProperties();
        $objectArray = [];
        foreach ($pros as $it) {
            $var = $it->getName();
            $objectArray[$var] = $reflectionClass
                ->getMethod("get" . self::camelize($var))
                ->invoke($this);
        }

        return $objectArray;
    }

    private function getTableFromAnnotation()
    {
        $reflectionClass = new \ReflectionClass($this);
        $doc = $reflectionClass->getDocComment();

        $tablePattern = "/@table\(\"(.+)\"\)/u";

        preg_match($tablePattern, $doc, $matches);

        if (!$matches) {
            throw new ServerException("Entity의 테이블이 지정되지 않았습니다.");
        }

        return $matches[1];
    }

    public function getParams()
    {
        $reflectionClass = new \ReflectionClass($this);
        $pros = $reflectionClass->getProperties();

        $columns = "";
        $values = "";
        foreach ($pros as $property) {
            $value = $reflectionClass
                ->getMethod("get" . self::camelize($property->getName()))
                ->invoke($this);
            if (!is_null($value)) {
                $columns .= $this->camelToSnake($property->getName()) . ",";
                $values .= $value . ",";
            }
        }
        return [substr($columns, 0, -1), substr($values, 0, -1)];
    }

    public function getInsertSQL()
    {
        $sql = "INSERT INTO :table ( :columns ) VALUE ( :values );";

        $sql = str_replace(":table", $this->getTableFromAnnotation(), $sql);

        $param = $this->getParams();
        $sql = str_replace(":columns", $param[0], $sql);
        $sql = str_replace(":values", $param[1], $sql);

        return $sql;
    }

    private function camelToSnake($str)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $str));
    }

    private function getColums()
    {
        $reflectionClass = new \ReflectionClass($this);
        $pros = $reflectionClass->getProperties();

        $columns = "";
        foreach ($pros as $property) {
            $columns .= $this->camelToSnake($property->getName()) . ",";
        }
        return substr($columns, 0, -1);
    }

    private function getWhereClosure($param)
    {
        return $param ? "WHERE $param" : "";
    }

    public function getSelectSQL($param = null)
    {
        $sql = "SELECT :columns FROM :table :where ;";

        $sql = str_replace(":table", $this->getTableFromAnnotation(), $sql);
        $sql = str_replace(":columns", $this->getColums(), $sql);
        $sql = str_replace(":where", $this->getWhereClosure($param), $sql);

        return $sql;
    }

    public function getColumAndValue()
    {
        $reflectionClass = new \ReflectionClass($this);
        $pros = $reflectionClass->getProperties();

        $idPattern = "/@id/u";

        $columns = "";
        foreach ($pros as $property) {
            #id 값 변경은 제외
            if (preg_match($idPattern, $property->getDocComment())) {
                continue;
            }

            $value = $reflectionClass
                ->getMethod("get" . self::camelize($property->getName()))
                ->invoke($this);
            if (!is_null($value)) {
                $columns .= $this->camelToSnake($property->getName()) . "=" . $value . ",";
            }
        }
        return substr($columns, 0, -1);
    }

    public function getUpdateQuery()
    {
        $query = "UPDATE :table SET :colmuns :where ;";

        $query = str_replace(":table", $this->getTableFromAnnotation(), $query);
        $query = str_replace(":columns", $this->getColumAndValue(), $query);

        return $query;
    }


}
