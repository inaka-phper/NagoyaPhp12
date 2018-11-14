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
    private $passengers;

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
        $passengers = explode(',', $parse[1]);

        foreach ($passengers as $passenger) {
            $this->passengers[] = $this->toPassenger($passenger);
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
    public function getPassengers()
    {
        return $this->passengers;
    }
}