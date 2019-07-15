<?php

namespace App;
use willvincent\Rateable\Rateable;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','sku','description','price','special_price','image','status'
    ];

    use Rateable;

    public function addProduct($product)
    {
       return $this->create($product);
    }

    public function updateProduct($product)
    {
       return $this->update($product);
    }

    public function saveImage($product,$request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $product = Product::find($this->id);
        $product->image = $name;
        $product->save();

        $path = $image->storeAs(
            'public', $name
        );
        }
    }

  

     public function getOriginalPriceAttribute()
    {
        $tax = Tax::first();
        if ($tax->status === 0) {
           return round($this->price,2);
        } else {
             return round($this->price + ($this->price * $tax->rate / 100),2);
        }
        
    }

    // price
    public function getTaxPriceAttribute()
    {
        $tax = Tax::first();
        $specialTaxSize = $this->special_price * $tax->rate / 100;
        $taxSize = $this->price * $tax->rate / 100;
        $discount = $tax->discount_size;
        $discount_procent = ($discount / 100) * $this->price;
        
       
        // IF TAX IS INCLUDED AND GLOBAL DISCOUNT IS OFF 
        if ($tax->status === 1 && $tax->discount === 0) {
            if ($this->special_price > 0 && $this->special_price < $this->price) {
                return round($this->special_price + $specialTaxSize,2);
            } else {
                return round($this->price + $taxSize,2);
            }


           // IF TAX IS INCLUDED AND GLOBAL DISCOUNT IS ON 
        } elseif($tax->status === 1 && $tax->discount === 1) {
            if ($tax->discount_type === 0) {
                if ($this->special_price > 0 && $this->special_price < $this->price) {
                   return round($this->special_price + $specialTaxSize,2);
                } else {
                    $pricewithdiscount = $this->price - $discount_procent;
                    $priceWithDiscountAndTax = $pricewithdiscount * ($tax->rate / 100);
                    return round(($this->price - $discount_procent) +$priceWithDiscountAndTax,2);
                }
            } elseif($tax->discount_type === 1) {
                if ($this->special_price > 0 && $this->special_price < $this->price) {
                   return round($this->special_price + $specialTaxSize,2);
                } else {
                       $priceWithTax = ($this->price - $discount)* ($tax->rate/100);
                   return round($this->price - $discount + $priceWithTax,2);
                }
            }


             // IF TAX IS EXCLUDED AND GLOBAL DISCOUNT IS ON  
        } elseif ($tax->status === 0 && $tax->discount === 1) {
            if ($tax->discount_type === 0) {
                if ($this->special_price > 0 && $this->special_price < $this->price) {
                   return round($this->special_price,2);
                } else {
                    return round($this->price - $discount_procent,2);
                }
            } elseif($tax->discount_type === 1) {
                if ($this->special_price > 0 && $this->special_price < $this->price) {
                   return round($this->special_price,2);
                } else {
                   return round($this->price - $tax->discount_size,2);
                }
            }


             // IF TAX IS EXCLUDED AND GLOBAL DISCOUNT IS OFF
        } else{
            if ($this->special_price > 0 && $this->special_price < $this->price) {
                return round($this->special_price,2);
            } else {
                return round($this->price,2);
            }
        }  
    }

    
}
