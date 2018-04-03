<?php
/**
 * Created by PhpStorm.
 * User: okuda
 * Date: 2018/03/31
 * Time: 15:37
 */

namespace InakaPhper\NagoyaPhp;


class Human
{
    private $type;

    private $pass;

    private $welfare;

    /**
     * Human constructor.
     * @param $symbol
     */
    public function __construct($symbol)
    {
        $this->parse($symbol);
    }

    /**
     * @param $symbol
     */
    public function parse($symbol)
    {
        $this->type = substr($symbol, 0, 1);
        $pricing = substr($symbol, 1, 1);
        $this->pass = $pricing === 'p';
        $this->welfare = $pricing === 'w';
    }

    public function getType()
    {
        return $this->type;
    }

    public function isPass()
    {
        return $this->pass;
    }

    public function isWelfare()
    {
        return $this->welfare;
    }

    public function isNormal()
    {
        return !$this->pass && !$this->welfare;
    }

    public function isChild()
    {
        return $this->type === 'C';
    }

    public function isAdult()
    {
        return $this->type === 'A';
    }

    public function isInfant()
    {
        return $this->type === 'I';
    }
}