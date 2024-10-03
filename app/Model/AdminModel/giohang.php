<?php
function loadall_giohang()
{
    $sql = "select * from bill order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

function getIdDonHang($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function updatetrangthaiDonHang($id, $trangthai)
{
    // Đảm bảo rằng các giá trị này đã được xử lý để tránh SQL injection
    $sql = "UPDATE bill SET trangthai = '$trangthai' WHERE id = $id"; // Thêm khoảng trắng
    pdo_execute($sql);
}


function get_trangthai_text($trangthai)
{
    switch ($trangthai) {
        case 0:
            return 'Chờ xác nhận';
        case 1:
            return 'Đang lấy hàng';
        case 2:
            return 'Đang giao hàng';
        case 3:
            return 'Giao hàng thành công';
        default:
            return 'Đơn hàng đã được huỷ';
    }
}
function kttt($idbill)
{
    $sql = "SELECT trangthai FROM bill WHERE id = $idbill";
    $result = pdo_query($sql);
    return $result;
}
