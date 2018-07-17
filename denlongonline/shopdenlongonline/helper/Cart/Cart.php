<?php

/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-07-04
 * Time: 6:04 PM
 */
class Cart
{
    //Khai báo các biến cần thiết trong Giỏ hàng
    public $items = []; // Mảng các  sản phẩm
    public $totalQty = 0;  // Tổng số lượng sản phẩm
    public $totalPrice = 0;  //  Tổng tiền trước khuyến mãi
    public $totalPromtionPrice = 0; // tổng tiền khi được khuyến mãi

    // Xây dựng phương thức khởi tạo cho giỏ hang
    function __construct($oldCart = null)
    {
        // Kiểm tra giỏ hàng có sản phẩm khoogn
        if ($oldCart)
        {
            $this->items              = $oldCart->items;
            $this->totalQty           = $oldCart->totalQty;
            $this->totalPrice         = $oldCart->totalPrice;
            $this->totalPromtionPrice = $oldCart->totalPromtionPrice;
        }

    }

    // Xây dựng phương thức thêm 1 sản phẩm vào giỏ hàng
    function add_Item_Cart($item, $soluong = 1)
    {
        // kiếm tra xem sản phẩm này có khuyến mãi không ?
        if ($item->promotion_price == 0)
        {
            $item->promotion_price = $item->price;
        }
        // tạo mảng gió hàng
        $giohang = [
            'qty'           => 0,
            'price'         => $item->price,
            'discountPrice' => $item->promotion_price,  // tính tổng tiền của sản phẩm
            'item'          => $item

        ];

        // Kiểm tra xem trước đó sản phẩm này đã có trong giỏ hàng chưa ? trả về TRUE OR FALSE
        if ($this->items)
        {
            if (array_key_exists($item->id, $this->items))
            {
                $giohang = $this->items[$item->id];
            }
        }
        // tính tiền cho 1 sản phẩm theo số lượng
        $giohang['qty']           = $giohang['qty'] + $soluong;
        $giohang['price']         = $item->price * $giohang['qty'];
        $giohang['discountPrice'] = $item->promotion_price * $giohang['qty'];
        // Tính tiền cho cả giỏ hàng
        $this->items[$item->id]   = $giohang;
        $this->totalQty           = $this->totalQty + $soluong;
        $this->totalPrice         = $this->totalPrice + ($soluong * $giohang['item']->price);
        $this->totalPromtionPrice = $this->totalPromtionPrice + ($soluong * $giohang['item']->promotion_price);

    }

    function update_Cart($item, $soluong = 1)
    {

        // Kiểm tra xem có khuyến mãi hay không
        if ($item->promotion_price == 0)
        {
            $item->promotion_price = $item->price;
        }
        $giohang = [
            'qty'           => 0,
            'price'         => $item->price,
            'discountPrice' => $item->promotion_price,  // tính tổng tiền của sản phẩm
            'item'          => $item
        ];
        // Tìm ra id của sản phẩm
        $idProduct = $item->id;
        // kiểm tra xem idProduct có tồn tại trong mảng không
        if ($this->items)
        {
            if (array_key_exists($idProduct, $this->items))
            {
                // thực hiện viejc upload lại giỏ hàng
                $this->totalQty = $this->items[$idProduct]['qty'];
                $this->totalPrice = $this->items[$idProduct]['price'];
                $this->totalPromtionPrice = $this->items[$idProduct]['discountPrice'];
            }
        }
        // Tính lại giá trị của Giỏ hàng
        $giohang['price'] =  $item->price  * $giohang['qty'];
        $giohang['discountPrice'] = $item->promotion_price * $giohang['qty'];
        // Up date lại  giot hàng cho toàn sản phẩm
        $this->items['id']  = $giohang  ;
        $this->totalQty = $this->totalQty + $soluong ;
        $this->totalPrice = $this->totalPrice + ($giohang['item']->price * $soluong);
        $this->totalPromtionPrice = $this->totalPromtionPrice + ($giohang['item']->promotion_price * $soluong);
    }
    function delete_OneProduct($idProduct){
        // Xóa các  hàng trong list gio hàng
        $this->items[$idProduct]['qty']--;
        $this->items[$idProduct]['price'] -= $this->items[$idProduct]['item']->price; //
        $this->items[$idProduct]['discountPrice'] -= $this->items[$idProduct]['item']->promotion_price;
        // Update lại toàn giỏ hàng
        $this->totalQty -- ;
        $this->totalPrice = $this->totalPrice -  ($this->items[$idProduct]['item']->price);
        $this->totalPromtionPrice = $this->totalPromtionPrice - ($this->items[$idProduct]['item']->promotion_price);
        if($this->items[$idProduct]['qty']<=0){
            unset($this->items[$idProduct]);  // nếu  không còn sản phẩm nào thì xóa khỏi giỏ hàng
        }

    }

    function delete_Product($idProduct){
        $this->totalQty -= $this->items[$idProduct]['qty'];
        $this->totalPrice  -= $this->items[$idProduct]['price'];
        $this->totalPromtionPrice  -= $this->items[$idProduct]['discountPrice'];
        unset($this->items[$idProduct]); //  xóa item khởi giỏ hàng
    }

}

?>