<?php


namespace CodeCommerce;

class Cart
{

    private $items;


    public function  __construct()
    {
        $this->items = [];
    }


    /**
       * @param array $image [id => 1 , extension => 'jpg']
     */
    public function add($id, $name, $price, array $image)
    {
       if (isset($this->items[$id])) {
           $this->items[$id]['qtd'] += 1;
       }
       else  {
                $this->items[$id] = [
                   'name' => $name,
                   'price' => $price,
                   'qtd' => 1,
                   'image' => $image
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

    public function changeProductQtd($id, $operation)
    {
        if (isset($this->items[$id]['qtd'])) {
            if ($operation == 'add') {
                $this->items[$id]['qtd'] += 1;
            }
            if ($operation == 'sub') {
                $this->items[$id]['qtd'] -= 1;
                if ($this->items[$id]['qtd'] <= 0) {
                    $this->remove($id);
                }
            }
        }

    }

    public function getTotal()
    {
        $total = 0;
        foreach($this->items as $item)
        {
           $total += $item['qtd'] * $item['price'];
        }

        return $total;
    }


}