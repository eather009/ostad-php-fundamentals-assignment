<?php
class Product {
    protected int $id;
    protected string $name;
    protected float $price;
    public function __construct(int $id,string $name,float $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
    protected function getFormattedPrice(){

        return sprintf("%0.2f",$this->price);
    }

    // TODO: Add showDetails method
    public function showDetails()
    {

        echo "Product Details:\n- ID: {$this->id}\n- Name: {$this->name}\n- Price: \${$this->getFormattedPrice()}";
    }
}


// Test the Product class
$product = new Product(1, 'T-shirt', 19.9909);
$product->showDetails();
