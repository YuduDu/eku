<h4>修改用户信息</h4>
<form class="form-inline" method="post" action="">
  <div class="form-group">
    <label>用户名</label>
    <input type="text" disabled value="<?php echo $user['Username'];?>" name="Username" class="form-control">
  </div>
  <div class="form-group">
    <label>密码</label>
    <input type="text" name="Password" value="<?php echo $user['Password'];?>" class="form-control">
  </div>
  <div class="form-group">
    <label>员工编号</label>
    <input type="text" name="Staffs_Sid" value="<?php echo $user['Staffs_Sid'];?>" class="form-control">
  </div>
  
  <br><div class="form-group">
    <button type="submit" name="admin_edit" class="btn btn-default">修改</button>
  </div>
</form>