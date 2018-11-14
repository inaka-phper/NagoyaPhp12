<?php
/**
 * Created by PhpStorm.
 * User: okuda
 * Date: 2018/03/31
 * Time: 15:39
 */

namespace InakaPhper\NagoyaPhp;


class Parser
{
    private $customers;

    private $section;

    /**
     * Parser constructor.
     * @param $input
     */
    public function __construct($input)
    {
        $this->parser($input);
    }

    /**
     * @param $symbol
     * @return Passenger
     */
    private function toPassenger($symbol)
    {
        return new Passenger($symbol);
    }

    /**
     * @param $input
     */
    private function parser($input)
    {
        $parse = explode(':', $input);
        $this->section = $parse[0];
        $customers = explode(',', $parse[1]);

        foreach ($customers as $customer) {
            $this->customers[] = $this->toPassenger($customer);
        }
    }

    /**
     * @return mixed
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @return mixed
     */
    public function getCustomers()
    {
        return $this->customers;
    }
}