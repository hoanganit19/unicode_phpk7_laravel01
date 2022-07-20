<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/css/bootstrap.min.css">
<form action="">
    <div class="row">
        <div class="col-5">
            <input type="search" name="keyword" class="form-control" placeholder="Tìm kiếm..." value="<?php echo request('keyword'); ?>">
        </div>
        <div class="col-4">
            <select name="status" class="form-control" id="">
                <option value="all">Tất cả trạng thái</option>
                <option value="active" <?php echo request('status')=='active'?'selected':false; ?>>Kích hoạt</option>
                <option value="inactive" <?php echo request('status')=='inactive'?'selected':false; ?>>Chưa kích hoạt</option>
            </select>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </div>
</form>
