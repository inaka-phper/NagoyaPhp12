<?php
/**
 * Created by PhpStorm.
 * User: okuda
 * Date: 2018/03/31
 * Time: 15:37
 */

namespace InakaPhper\NagoyaPhp;


use InakaPhper\NagoyaPhp\Exception\LogicException;

class Passenger
{
    private $type;

    private $pass;

    private $free = false;

    private $welfare;

    /**
     * Passenger constructor.
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

    public function setFree()
    {
        if ($this->isChild() || $this->isInfant()) {
            $this->free = true;
        } else {
            throw new LogicException('大人は無料にできません');
        }
    }

    public function isFree()
    {
        return $this->free;
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