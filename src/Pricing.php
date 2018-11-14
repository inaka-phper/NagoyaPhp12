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
     * @var Passenger
     */
    private $passenger;

    /**
     * Pricing constructor.
     * @param int $section
     * @param Passenger $passenger
     */
    public function __construct(int $section, Passenger $passenger)
    {
        $this->section = $section;
        $this->passenger = $passenger;
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
        if ($this->passenger->isPass() || $this->passenger->isFree()) {
            return 0;
        }

        $price = $this->section;

        if ($this->passenger->isChild() || $this->passenger->isInfant()) {
            $price = $this->child($price);
        }

        if ($this->passenger->isWelfare()) {
            $price = $this->welfare($price);
        }

        return $price;
    }

}