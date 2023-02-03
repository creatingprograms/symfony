<?php
// src/Entity/Cost.php

namespace App\Entity;

class Cost
{
 	protected $product;
	protected $tax;
	public function getProduct(): string
    {
        return $this->product;
    }
    public function setProduct(string $product): void
    {
        $this->product = $product;
    }
 	public function getTax(): string
    {
        return $this->tax;
    }
    public function setTax(string $tax): void
    {
        $this->tax = $tax;
    }
    public function getCost(): int|float
    {
    $taxNumber = $this->tax;	//  for example DE123456789 or IT12345678912 or GR123456789
    $country = substr($taxNumber, 0, 2); 
    switch ($country) {
    case "DE":
        $taxRate = 19;
		break;
    case "IT":
        $taxRate = 22;
		break;
    case "GR":
        $taxRate = 24;
		break;
    default:
       $taxRate = 0;
    }
    if ($taxRate == 0) {
    $totalCost = 0;
    return $totalCost;
    } else {
    $price = $this->product;
    $totalCost = ($price/100)*$taxRate + $price;		
    return $totalCost;
    }
    }
}
?>