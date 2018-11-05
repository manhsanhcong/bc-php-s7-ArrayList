<?php
/**
 * Created by PhpStorm.
 * User: hoanltm
 * Date: 05/11/2018
 * Time: 08:09
 */

class MyList
{
    private $arrList = array();
    public function ArrayList($arr = '')
    {
        if (is_array($arr) == true) {
            $this->arrList = $arr;
        } else {
            $this->arrList = array();
        }
    }
    public function add($obj)
    {
        array_push($this->arrList, $obj);
    }
    public function addIndex($index, $obj)
    {
        array_splice($this->arrList, $index, 0, [$obj]);
    }
    public function isInteger($toCheck)
    {
        return preg_match('/^[0-9]+$/', $toCheck);
    }
    public function get($index)
    {
        if ($this->isInteger($index) && $index < $this->size()) {
            return $this->arrList[$index];
        } else {
            die('ERROR in ArrayList.get');
        }
    }
    public function remove($index)
    {
        if ($this->isInteger($index)) {
            unset($this->arrList[$index]);
            $newArrayList = array();
            for ($i = 0; $i < $this->size(); $i++) {
                if ($index != $i) {
                    $newArrayList[] = $this->get($i);
                }
            }
            $this->arrList = $newArrayList;
        } else {
            die("ERROR in ArrayList.remove <br> Integer value required");
        }
    }
    public function size()
    {
        return count($this->arrList);
    }
    public function toArray()
    {
        return $this->arrList;
    }
    public function contains($obj)
    {
        return ((array_search($obj, $this->arrList)) != false);
    }
    public function indexOf($obj)
    {
        return array_search($obj, $this->arrList);
    }
}
