<?php
namespace Hazi4;

class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    public function __construct()
    {
        $this->items = [];
    }

    /**
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {

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
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {

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
     * @return int
     */
    public function getTotalQuantity(): int
    {

        $totalQuantity = 0;
        foreach ($this->items as $item)
        {
            $totalQuantity += $item->getQuantity();
        }
        return $totalQuantity;
    }

    /**
     * @return float
     */
    public function getTotalSum(): float
    {

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