<?php

/**
 * COMMON TITLE
 */

//Products
const TITLE_GET_PRODUCT_BY_TYPES = "DANH SÁCH SẢN PHẨM THEO THỂ LOẠI ";
const TITLE_LIST_PRODUCT_DELETE = "DANH SÁCH SẢN PHẨM ĐÃ BỊ XÓA ";
const TITLE_ADD_PRODUCT = "THÊM SẢN PHẨM LỒNG ĐÈN";
const TITLE_EDIT_PRODUCT = "SỬA SẢN PHẨM ĐÈN LỒNG";

//Customers
const TITLE_LIST_CUSTOMERS = "DANH SÁCH KHÁCH HÀNG";
const TITLE_ADD_CUSTOMER = "THÊM MỚI KHÁCH HÀNG ";
const TITLE_EDIT_CUSTOMER = "CHỈNH SỬA KHÁCH HÀNG";

//Bills
const TITLE_LIST_BILLS = "QUẢN LÝ ĐƠN HÀNG";
const TITLE_DETAIL_BILLS = "CHI TIẾT ĐƠN HÀNG";
const TITLE_BILL_NOT_APPROVALS = "ĐƠN HÀNG CHƯA THANH TOÁN";
const TITLE_BILL_APPROVAL = "ĐƠN HÀNG ĐÃ XÁC NHẬN";
const TITLE_BILL_SEND_SUCCESS = "ĐƠN HÀNG ĐÃ GIAO";
const TITLE_BILL_CANCEL = "ĐƠN HÀNG BỊ HỦY";

/**
 * COMMON MESSGAGES
 */

//Products
const MESSAGE_DELETE_SUCCESS = "ĐÃ XÓA THÀNH CÔNG!";
const MESSAGE_DELETE_FAIL = "XÓA THẤT BẠI";
const ROLLBACK_STATUS_PRODUCT_SUCCESS = "ĐÃ KHÔI PHỤC TRẠNG THÁI SẢN PHẨM THÀNH CÔNG ";
const ROLLBACK_STATUS_PRODUCT_FAIL = "KHÔI PHỤC SẢN PHẨM THẤT BẠI";
const MESSAGE_ADD_PRODUCT_SUCCESS = "THÊM THÀNH CÔNG SẢN PHẨM";
const MESSAGE_EDIT_PRODUCT_SUCCESS = "SỬA THÀNH CÔNG SẢN PHẨM";

//Customers
const MESSAGE_ROLLBACK_CUSTOMSER_SUCCESS = "KHÔI PHỤC XÓA KHÁCH HÀNG THÀNH CÔNG";
const MESSAGE_ROLLBACK_CUSTOMER_FAIL = "KHÔI PHỤC XÓA KHÁCH HÀNG THẤT BẠI";
const MESSAGE_EXIST_EMAIL = "Email của bạn bị trùng - Vui lòng kiểm tra lại";
const MESSAGE_ADD_CUSTOMER_SUCCESS = "THÊM KHÁCH HÀNG THÀNH CÔNG ";
const MESSAGE_ADD_CUSTOMER_FAIL = "THÊM KHÁCH HÀNG THẤT BẠI!";
const MESSAGE_UPDATE_CUSTOMER_SUCCESS = "CẬP NHẬT KHÁCH HÀNG THÀNH CÔNG ";
const MESSAGE_UPDATE_CUSTOMER_FAIL = "CẬP NHẬT KHÁCH HÀNG THẤT BẠI";

//Login
const MESSAGE_LOGIN_FAIL = "ĐĂNG NHẬP KHÔNG THÀNH CÔNG";
const MESSAGE_NULL_EMAIL_LOGIN  = "VUI LÒNG NHẬP VÀO EMAIL";
const MESSAGE_NULL_PASSWORD_LOGIN = "VUI LÒNG NHẬP MẬT KHẨU";

// Bills.
const MESSAGE_BILL_UPDATE_SUCCESS = "CẬP NHẬT TRẠNG THÁI GIAO HÀNG THÀNH CÔNG";
const MESSAGE_BILL_UPDATE_FAIL = "THẤT BẠI KHI CẬP NHẬT";
const MESSAGE_BILL_CANCEL_SUCCESS = "HỦY ĐƠN HÀNG THÀNH CÔNG ";
const MESSAGE_BILL_CANCEL_FAIL = "HỦY ĐƠN HÀNG THẤT BẠI ";

// Messages not null dâta
const MESSAGES_NOT_NULL_URL = "VUI LÒNG ĐIỀN VÀO URL ";
const MESSAGES_NOT_NULL_NAMEPRODUCT = "VUI LÒNG ĐIỀN VÀO TÊN SẢN PHẨM.";
const MESSAGES_NOT_NULL_PROMOTION = "VUI LÒNG NHẬP VÀO GIÁ KHUYẾN MÃI";
const MESSAGES_NOT_NULL_PRICE = "VUI LÒNG NHẬP VÀO GIÁ SẢN PHẨM";
const MESSAGES_NOT_NULL_DETAIL = "VUI LÒNG NHẬP VÀO CHI TIẾT SẢN PHẨM";
const MESSAGE_NOT_NULL_DETAIL_PROMOTION = "VUI LÒNG NHẬP VÀO CHI TIẾT KHUYẾN MÃI";

// Messages Add Customers
const MESSAGE_NOT_NULL_EMAIL = "VUI LÒNG NHẬP VÀO EMAIL";
const MESSAGE_NOT_NULL_NAME = "VUI LÒNG NHẬP VÀO TÊN KHÁCH HÀNG";
const MESSAGE_NOT_NULL_ADDRESS = "VUI LÒNG NHẬP VÀO ĐỊA CHỈ";
const MESSAGE_NOT_NULL_NOTE = "VUI LÒNG NHẬP VÀO GHI CHÚ";
const MESSAGE_NOT_NULL_PHONE = "VUI LÒNG ĐIỀN VÀO SỐ ĐIỆN THOẠI";

/**
 * COMMON CONSTANT VARIABLES
 */

// Set status with insert or edit
const DELETE_FLAG_OFF = 0;
const DELETE_FLAG_ON = 1;
const NEW_PRODUCT = 1;
const SPECIAL_PRODUCT = 1 ;

// set default hidden button
const BUTTON_HIDDEN_OFF = 0;
const BUTTON_HIDDEN_ON = 1;

// set code with Bills
const CODE_BILLS = "DH000";

// status Bills
const STATUS_BILLS_NOT_APPROVAL = 0;
const STATUS_BILL_APPROVAL = 1;
const STATUS_BILLS_SEND_SUCCESS = 2 ;
/**
 * DIRECTORY FOLDER ADMIN
 */
const DIRECTORY_ADMIN_VIEW = "include/admin.view.php";


