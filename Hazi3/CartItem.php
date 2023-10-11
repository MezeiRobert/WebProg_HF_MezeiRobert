<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    // TODO Generate constructor with all properties of the class
    // TODO Generate getters and setters of properties

    public function increaseQuantity()
    {
        //TODO $quantity must be increased by one.
        // Bonus: $quantity must not become more than whatever is Product::$availableQuantity

        if ($this->quantity + 1 <= $this->product->getAvailableQuantity())
        {
            $this->quantity += 1;
        } else
        {
            echo "Quantity cannot be increased";
        }
    }

    public function decreaseQuantity()
    {
        //TODO $quantity must be increased by one.
        // Bonus: Quantity must not become less than 1

        if ($this->quantity - 1 >= 1)
        {
            $this->quantity -= 1;
        } else
        {
            echo "Quantity cannot be decreased";
        }
    }

	/**
	 * @return Product
	 */
	public function getProduct(): Product {
		return $this->product;
	}
	
	/**
	 * @param Product $product 
	 * @return self
	 */
	public function setProduct(Product $product): self {
		$this->product = $product;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getQuantity(): int {
		return $this->quantity;
	}
	
	/**
	 * @param int $quantity 
	 * @return self
	 */
	public function setQuantity(int $quantity): self {
		$this->quantity = $quantity;
		return $this;
	}
}