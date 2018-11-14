<?php
/**
 * This file is part of the InakaPhper.NagoyaPhp
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace InakaPhper\NagoyaPhp;

use Tightenco\Collect\Support\Collection;

class NagoyaPhp
{
    private $section;

    private $passengers;

    /**
     * NagoyaPhp constructor.
     * @param $input
     */
    public function __construct($input)
    {
        $parser = new Parser($input);

        $this->section = $parser->getSection();
        $this->passengers = new Collection($parser->getCustomers());

        $adults = $this->passengers->filter(function ($item) {
            /** @var $item Passenger */
            return $item->isAdult();
        });

        $infant = $this->passengers->filter(function ($item) {
            /** @var $item Passenger */
            return $item->isInfant();
        })->sortByDesc(function ($item) {
            return (new Pricing($this->section, $item))->toPrice();
        });

        $free = $adults->count() * 2;

        $i = 0;
        foreach ($infant as $key => $item) {
            if ($i < $free) {
                $this->passengers->get($key)->setFree();
            }
            $i++;
        }
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return (int) $this->passengers->sum(function ($customer) {
            return (new Pricing($this->section, $customer))->toPrice();
        });

    }
}
