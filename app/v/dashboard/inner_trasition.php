<form class="form-inline" method="post" action="">
  <div class="form-group">
    <label>涉及到的仓库编号</label>
    <input type="text" name="I_T_Wid" class="form-control">
  </div>
  <div class="form-group">
    <label>数量</label>
    <input type="text" name="Amount" class="form-control" >
  </div>
  <div class="form-group">
    <label>物品的名称</label>
    <input type="text" name="Items_Iname" class="form-control" >
  </div>
  <div class="radio">
  流转类型:
    <label>入库
      <input type="radio" name="Operate" value="I" checked>
    </label>
  </div>
  <div class="radio">
    <label>出库
      <input type="radio" name="Operate" value="O">
    </label>
  </div>

  <div class="form-group">
    <label>涉及到的库存项编号</label>
    <input type="text" name="Stockid" class="form-control" >
  </div>
  
  <br><div class="form-group"><button type="submit" name="innert_trasition_add" class="btn btn-default">添加内部流转</button></div>
</form>