<?php

namespace App;

class Cart
{
    public $sanpham = null;
    public $TongSL = 0;
    public $TongTien= 0;

    public function __construct($Cart){
    	if($Cart){
    		$this->sanpham = $Cart->sanpham;
            $this->TongSL = $Cart->TongSL;
            $this->TongTien = $Cart->TongTien;
    	}
    }

    // Them san pham vao cart
    public function AddCarts($products, $id){
    	$newSanpham = ['quanty'=>0,'price'=>(float) $products->price,'ttsanpham'=>$products];
    	if($this->sanpham){
    		if(array_key_exists($id, $this->sanpham)){
    			$newSanpham = $this->sanpham[$id];
    		}
    	}
        $newSanpham['quanty']++;
        $newSanpham['price']= $newSanpham['quanty'] * (float) $products->price;
        
        $this->sanpham[$id] = $newSanpham;
        $this->TongSL++;
        $this->TongTien += (float) $products->price;
    }

    // xoa san pham vao cart
    public function DeleteItemCart($id){
        $this->TongSL -= $this->sanpham[$id]['quanty'];
        $this->TongTien -=  $this->sanpham[$id]['price'];
        unset($this->sanpham[$id]);
       
    }


}
