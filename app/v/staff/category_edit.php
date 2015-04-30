<form class="form-inline" method="post" action="">
  <div class="form-group">
    <label>员工类型ID</label>
    <input type="text" value="<?php echo $category['SCid'];?>" name="SCid" class="form-control">
  </div>
  <div class="form-group">
    <label>员工类型描述</label>
    <input type="text" value="<?php echo $category['SType'];?>" name="SType" class="form-control">
  </div>
  
  <br><div class="form-group">
    <button type="submit" name="category_edit" class="btn btn-default">修改</button>
  </div>
</form>