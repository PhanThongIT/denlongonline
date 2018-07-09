<?php

/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-04
 * Time: 6:04 PM
 */
class Cart
{
    // Khởi tạo lên các biến càn thiết trong giỏ hàng
    public $items = []; // sản phẩm
    public $totalQty = 0; // số lượng
    public $totalPrice = 0; // giá chưa khuyến mãi
    public $promtPrice = 0; // giá khuyến mãi

    // Phương thức khởi tạo  contructor
    function __construct($listSanPham = null)
    {
// Kiểm tra xem list sản phẩm tồn tại ?
        if ($listSanPham)
        {
            $this->items      = $listSanPham->items;
            $this->qty        = $listSanPham->totalQty;
            $this->price      = $listSanPham->totalPrice;
            $this->promtPrice = $listSanPham->promtPrice;
        }
    }

    // Thêm 1 sản phẩm vào listSanPham
    function add_Item_Cart($item, $qty = 1)
    {
        // Kiếm tra xem sane phẩm này có khuyến mãi hay không
        if ($item->promotion_price == 0)
        {
            $item->promotion_price = $item->price;
        }
        // Đưa sản phẩm vào mảng
        $listSanPham = [
            'qty'           => 0,
            'price'         => $item->price,
            'discountPrice' => $item->promotion_price,
            'item'          => $item
        ];
        // Kiếm tra sự tồn tại  cảu sản phẩm
        if ($this->items)
        {
            if (array_key_exists($item->id, $this->items))
            {
                $listSanPham = $this->items[$item->id];
            }
            // Tính giá tiền của 1 sản phẩm kèm theo số lượng
            $listSanPham['qty']           = $listSanPham['qty'] + $qty;
            $listSanPham['price']         = $listSanPham['qty'] * $item->price;
            $listSanPham['discountPrice'] = $listSanPham['qty'] * $item->promotion_price;
            // Tính tổng giá tiền của giò hàng
            $this->items[$item->id] = $listSanPham;
            $this->totalQty         = $this->totalQty + $qty;
            $this->totalPrice       = $this->totalPrice + ($listSanPham['item']->price * $qty);
            $this->promtPrice       = $this->promtPrice + ($listSanPham['item']->promotion_price * qty);
        }
    }
}

?>