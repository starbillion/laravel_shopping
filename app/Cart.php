<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id){
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem =  $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

    public function decreaseQuantity($id){
        if ($this->items[$id]['qty'] > 1){
            $this->items[$id]['qty'] -= 1;
            $this->totalQty -= 1;
            $this->totalPrice -= $this->items[$id]['price'];
        }
    }

    public function increaseQuantity($id, $product){
        if($this->items[$id]['qty'] < $product['stock']){
            $this->items[$id]['qty'] += 1;
            $this->totalQty += 1;
            $this->totalPrice += $this->items[$id]['price'];
        }

    }
}
