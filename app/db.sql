##-- create triggers

DROP TRIGGER IF EXISTS Outbound_AFTER_INSERT;
DROP TRIGGER IF EXISTS Outbound_details_AFTER_INSERT;
DROP TRIGGER IF EXISTS Stocks_AFTER_INSERT;
DROP TRIGGER IF EXISTS Stocks_BEFORE_UPDATE;
DROP TRIGGER IF EXISTS Stocks_AFTER_UPDATE;
DROP TRIGGER IF EXISTS Stocks_BEFORE_DELETE;
DROP TRIGGER IF EXISTS Inbound_AFTER_INSERT;
DROP TRIGGER IF EXISTS Inbound_details_AFTER_INSERT;

DELIMITER $$
CREATE TRIGGER Outbound_AFTER_INSERT AFTER INSERT ON Outbound FOR EACH ROW ##--每次向Outbound中插入数据之后，将出货单编号，客户编号和创建时间插入客户出货单统计表中
BEGIN
	INSERT INTO Customers_Order_statistics SET Outbound_id=NEW.Outbound_id, Cid=NEW.Customer_Cid, CreateTime=New.CreateTime;
END;

CREATE TRIGGER Outbound_details_AFTER_INSERT AFTER INSERT ON Outbound_details FOR EACH ROW ##--每次向出货单详情Outbound_detail中插入数据之后，根据出货单详情更新客户出货单统计表的总金额
BEGIN
	UPDATE Customer_Order_statistics SET Money=Money+cast(NEW.Amount AS DECIMAL(10,2))*NEW.Unit_price WHERE Outbound_id=NEW.Outbound_id;
END;

CREATE TRIGGER Stocks_AFTER_INSERT AFTER INSERT ON Stocks FOR EACH ROW ##--每次有新的库存项时，刷新库存统计表，如果该物品已经存在就更新剩余数量，如果不存在就新建一行数据
BEGIN
 INSERT INTO Stock_collection (Iid, Remain_Amount,Wid) VALUES (NEW.Stocks_Iname, NEW.Stockamount, NEW.Stocks_Wid) ON DUPLICATE KEY UPDATE Remain_Amount=Remain_Amount+NEW.Stockamount;
END;

CREATE TRIGGER Stocks_BEFORE_UPDATE BEFORE UPDATE ON Stocks FOR EACH ROW ##--每次更新库存项之前，更新库存统计表，减去当前要更新的库存项的量，刷新剩余数量。
BEGIN
	UPDATE Stock_collection set Remain_Amount=Remain_Amount-OLD.Stockamount WHERE Iid=OLD.Stockid;
END;

CREATE TRIGGER Stocks_AFTER_UPDATE AFTER UPDATE ON Stocks FOR EACH ROW ##--每次更新库存项之后，更新库存统计表，加上更新后的库存项的量，刷新剩余数量。这样能保证一直剩余数量一直在更新，不会遗漏
BEGIN
	UPDATE Stock_collection set Remain_Amount=Remain_Amount+NEW.Stockamount WHERE Iid=OLD.Stockid;
END;

CREATE TRIGGER Stocks_BEFORE_DELETE BEFORE DELETE ON Stocks FOR EACH ROW ##--每次删除库存项时，更新库存统计表，剩余数量减去库存项的数量； 将这个库存项加到历史库存项中
BEGIN
	UPDATE Stock_collection SC SET Remain_Amount=Remain_Amount-OLD.Stockamount WHERE SC.Items_Iname=OLD.Stocks_Iname;
    INSERT INTO History_Stocks SET Stockid=OLD.stockid, Stocks_Wid=OLD.Stocks_Wid, Stocks_Iname=OLD.Stocks_Iname, Stockamount=OLD.Stockamount, Stockarea=OLD.Stockarea, Instocktime=OLD.Instocktime, Outstocktime=NOW();
END;

CREATE TRIGGER Inbound_AFTER_INSERT AFTER INSERT ON Inbound FOR EACH ROW ##--插入新的入库单后，将新的入库单信息插入供应商入库单统计表中
BEGIN
	INSERT INTO Suppliers_Order_statistics SET Sid=NEW.Suppliers_Sid, Inbound_id=NEW.Inbound_id, CreateTime=NEW.CreateTime;
END;

CREATE TRIGGER Inbound_details_AFTER_INSERT AFTER INSERT ON Inbound_details FOR EACH ROW##--插入新的入库单详情后，将入库单的总金额插入到对应的入库单数据中。
BEGIN
	UPDATE Suppliers_Order_statistics SET Money=Money+cast(NEW.Amount AS DECIMAL(10,2))*NEW.Unit_Price WHERE Inbound_id=NEW.Inbound_id;
END; $$

DELIMITER $$