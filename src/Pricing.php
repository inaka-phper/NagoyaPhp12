<?php
/**
 * Created by PhpStorm.
 * User: okuda
 * Date: 2018/03/31
 * Time: 15:45
 */

namespace InakaPhper\NagoyaPhp;


class Pricing
{
    /**
     * 区間料金
     * @var int
     */
    private $section;

    /**
     * @var Human
     */
    private $human;

    /**
     * Pricing constructor.
     * @param int $section
     * @param Human $human
     */
    public function __construct(int $section, Human $human)
    {
        $this->section = $section;
        $this->human = $human;
    }

    /**
     * @param $price
     * @return float|int
     */
    public function child($price)
    {
        return (int) ceil(($price / 2) / 10) * 10;
    }

    /**
     * @param $price
     * @return float|int
     */
    public function welfare($price)
    {
        return (int) ceil(($price / 2) / 10) * 10;
    }

    /**
     * @return float|int
     */
    public function toPrice()
    {
        if ($this->human->isPass()) {
            return 0;
        }

        $price = $this->section;

        if (!$this->human->isAdult()) {
            $price = $this->child($price);
        }

        if ($this->human->isWelfare()) {
            $price = $this->welfare($price);
        }

        return $price;
    }

}