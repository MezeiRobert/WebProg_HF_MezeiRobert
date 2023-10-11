<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    // TODO Generate getters and setters of properties

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        //TODO Implement method

        foreach($this->getItems() as $item)
        {
            if ($item->getProduct()->getId() === $product->getId())
            {
                $currentQuantity = $item->getQuantity();
                $newQuantity = min($currentQuantity + $quantity, $product->getAvailableQuantity());
                $item->setQuantity($newQuantity);
                return $item;
            }    
        }

        $cartItem = new CartItem($product, $quantity);
        $this->items[] = $cartItem;
        return $cartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        //TODO Implement method

        foreach ($this->getItems() as $key => $item)
        {
            if ($item->getProduct() === $product)
            {
                unset($this->items[$key]);
                break;
            }
        }

    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        //TODO Implement method

        $totalQuantity = 0;
        foreach ($this->items as $item)
        {
            $totalQuantity += $item->getQuantity();
        }
        return $totalQuantity;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        //TODO Implement method

        $totalSum = 0;
        foreach ($this->getItems() as $item) 
        {
            $totalSum += $item->getProduct()->getPrice() * $item->getQuantity();
        }
        return $totalSum;
    }

	/**
	 * 
	 * @return array
	 */
	public function getItems(): array {
		return $this->items;
	}
	
	/**
	 * 
	 * @param array $items 
	 * @return self
	 */
	public function setItems(array $items): self {
		$this->items = $items;
		return $this;
	}
}