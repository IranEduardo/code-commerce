<?php


namespace CodeCommerce;

class Cart
{

    private $items;


    public function  __construct()
    {
        $this->items = [];
    }

    public function add($id, $name, $price)
    {
       if (isset($this->items[$id])) {
           $this->items[$id]['qtd'] += 1;
       }
       else  {
                $this->items[$id] = [
                   'name' => $name,
                   'price' => $price,
                   'qtd' => 1
               ];
       }

    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
       return $this->items;
    }

    public function getTotal()
    {
        $total = 0;
        foreach($this->items as $item)
        {
           $total += $item['qtd'] * $item['price'];
        }
    }

}