<?php
    # Kiểm tra xem form đã được gửi đi hay chưa
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        # Xử lí dữ liệu form ở đây

        # Gán giá trị mới cho action sau khi xử lí form
        $newAction = "";
    } else {
        # Giá trị action ban đầu
        $newAction = "deleteEmployee";
    }
?>
<form method="post" action="<?php echo $newAction; ?>">
    <div class="mb-3">
        <label for="" class="form-label">Select a Deparment</label> <br>
        <select
            class="form-select form-select-lg"
            name="selectDeparment"
            id=""
        >
            <option selected>Select one</option>
            <option value="Kế toán">Kế toán</option>
            <option value="IT">IT</option>
            <option value="Kinh doanh">Kinh doanh</option>
        </select>
        <button type="submit" class="btn btn-primary" name="btDelete">Bấm</button>
    </div>  
</form>

<?php
    if (isset($data["result"])) {
        if ($data["result"]) {
            echo "Xoá thành công";
        } else {
            echo "Xoá không thành công";
        }
    }
?>