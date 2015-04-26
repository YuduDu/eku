DROP DATABASE IF EXISTS final_project;
CREATE DATABASE IF NOT EXISTS final_project;
USE final_project;

##-- create tables

DROP TABLE IF EXISTS Customers ;
DROP TABLE IF EXISTS Staff_Category ;
DROP TABLE IF EXISTS Staffs ;
DROP TABLE IF EXISTS Warehouses;
DROP TABLE IF EXISTS Outbound ;
DROP TABLE IF EXISTS Customer_Order_statistics ;
DROP TABLE IF EXISTS Item_Category ;
DROP TABLE IF EXISTS Items ;
DROP TABLE IF EXISTS Outbound_details ;
DROP TABLE IF EXISTS Stock_collection ;
DROP TABLE IF EXISTS Stocks ;
DROP TABLE IF EXISTS Suppliers ;
DROP TABLE IF EXISTS Inbound ;
DROP TABLE IF EXISTS Suppliers_Order_statistics ;
DROP TABLE IF EXISTS User ;
DROP TABLE IF EXISTS History_Stocks ;
DROP TABLE IF EXISTS Inner_Trasition ;

##-- Table Customers 客户表

CREATE TABLE IF NOT EXISTS Customers (
  Cid INT NOT NULL AUTO_INCREMENT,##--客户编号
  Cname VARCHAR(50) NOT NULL,##--客户公司名称
  Ccontact VARCHAR(50) NULL DEFAULT NULL,##--客户联系人姓名
  Caddress VARCHAR(500) NULL DEFAULT NULL,##--客户地址
  Cpostcode CHAR(6) NULL DEFAULT NULL,##--客户邮编
  Cphone VARCHAR(20) NULL DEFAULT NULL,##--客户电话
  Cbank VARCHAR(20) NULL DEFAULT NULL,##--客户银行
  Caccount VARCHAR(20) NULL DEFAULT NULL,##--客户银行账号
  PRIMARY KEY (Cid))
ENGINE = InnoDB;

##-- Table Staff_Category 员工类型

CREATE TABLE IF NOT EXISTS Staff_Category (
  SCid INT NOT NULL,##--员工类型的id
  SType VARCHAR(20) NOT NULL,##--员工类型的描述
  PRIMARY KEY (SCid))
ENGINE = InnoDB;

##-- Table Staffs 员工表

CREATE TABLE IF NOT EXISTS Staffs (
  Sid INT NOT NULL AUTO_INCREMENT,##--员工的编号
  Sname VARCHAR(20) NOT NULL,##--员工名字
  SCid INT NULL DEFAULT NULL,##--员工类型的编号
  Sphone VARCHAR(20) NULL DEFAULT NULL,##--员工的电话
  PRIMARY KEY (Sid),
  INDEX Scid_idx (SCid ASC),
  CONSTRAINT Staffs_SCid
    FOREIGN KEY (SCid)
    REFERENCES Staff_Category (SCid)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB;

##-- Table Warehouses  仓库表

CREATE TABLE IF NOT EXISTS Warehouses (
  Wid INT NOT NULL AUTO_INCREMENT, ##--仓库编号
  Admin_id INT NULL DEFAULT NULL,##--仓库负责员工的编号
  PRIMARY KEY (Wid),
  INDEX Admin_idx (Admin_id ASC),
  CONSTRAINT Warehouses_Admin_id
    FOREIGN KEY (Admin_id)
    REFERENCES Staffs (Sid)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB;

##-- Table Outbound  出库单

CREATE TABLE IF NOT EXISTS Outbound (
  Outbound_id INT NOT NULL AUTO_INCREMENT,##--出库单编号
  Customer_Cid INT NULL DEFAULT NULL,##--出库单对应的客户编号
  Createtime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, ##--出库单创建时间
  Approver_id INT NULL DEFAULT NULL, ##--负责出库的员工编号
  Consignee VARCHAR(20) NULL DEFAULT NULL,##--送货人的姓名
  PRIMARY KEY (Outbound_id),
  INDEX Cid_idx (Customer_Cid ASC),
  INDEX Approver_idx (Approver_id ASC),
  CONSTRAINT Outbound_Cid
    FOREIGN KEY (Customer_Cid)
    REFERENCES Customers (Cid)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT Outbound_Approver_id
    FOREIGN KEY (Approver_id)
    REFERENCES Staffs (Sid)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

##-- Table Customer_Order_statistics  客户的出货单统计

CREATE TABLE IF NOT EXISTS Customer_Order_statistics (
  Cid INT NOT NULL,##--客户的编号
  Money DECIMAL(10,2) NULL,##--交易的总金额
  Outbound_id INT NULL,##--交易单的编号
  CreateTime DATETIME NULL DEFAULT NULL，##--出货单创建时间表
  PRIMARY KEY (Outbound_id),
  INDEX Customers1_Cid (Cid ASC),
  INDEX Outbound_id (Outbound_id ASC),
  CONSTRAINT Cid
    FOREIGN KEY (Cid)
    REFERENCES Customers (Cid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT Outbound_id
    FOREIGN KEY (Outbound_id)
    REFERENCES Outbound (Outbound_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

##-- Table Item Category 仓库存储的物品的大类

CREATE TABLE IF NOT EXISTS Item_Category (
  ICname VARCHAR(50) NOT NULL,##--物品的大类
  Spec VARCHAR(45) NULL,##--这一大类物品的类型 原材料/半成品/成品 三种
  PRIMARY KEY (ICname))
ENGINE = InnoDB;

##-- Table Items 仓库存储的物品的具体名称

CREATE TABLE IF NOT EXISTS Items (
  Iname VARCHAR(100) NOT NULL,##--物品的名称
  ICname VARCHAR(50) NULL,##--物品的大类
  Unit VARCHAR(20) NULL DEFAULT NULL,##--物品的计量单位
  PRIMARY KEY (Iname, ICname),
  INDEX Pcid_idx (Iname ASC),
  CONSTRAINT Items_ICid
    FOREIGN KEY (ICname)
    REFERENCES Item_Category (ICname)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

##-- Table Outbound_details 出库单的物品详情

CREATE TABLE IF NOT EXISTS Outbound_details (
  Outbound_id INT NOT NULL,##--出库单的编号
  Outbound_Iname VARCHAR(100) NOT NULL, ##--物品的名称
  Amount FLOAT NULL DEFAULT NULL,##--数量
  Unit_price DECIMAL(10,2) NULL,##--单价
  Warehouse_Wid INT NOT NULL,##--存储在的仓库编号
  Outbound_Stockid INT NULL,##--作为仓库中的一个库存项存储，所分配的一个库存项编号
  PRIMARY KEY (Outbound_Iname, Outbound_id),
  INDEX Outbound_id_idx (Outbound_id ASC),
  INDEX Outbound_Iname_idx (Outbound_Iname ASC),
  INDEX Outbound_Warehouse_idx (Warehouse_Wid ASC),
  CONSTRAINT D_Outbound_id
    FOREIGN KEY (Outbound_id)
    REFERENCES Outbound (Outbound_id)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT D_Outbound_Iname
    FOREIGN KEY (Outbound_Iname)
    REFERENCES Items (Iname)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT Outbound_Warehouse_Wid
    FOREIGN KEY (Warehouse_Wid)
    REFERENCES Warehouses (Wid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

##-- Table Stock_collection 每个物品的库存统计表

CREATE TABLE IF NOT EXISTS Stock_collection (
  Remain_Amount FLOAT NOT NULL,##--剩余的数量
  Items_Iname VARCHAR(100) NOT NULL,##--物品的名称
  PRIMARY KEY (Items_Iname),
  Minimum FLOAT NOT NULL,##--警戒的最小值
  Maximum FLOAT NOT NULL,##--警戒的最大值
  INDEX Stock_collection_Items1_idx (Items_Iname ASC),
  CONSTRAINT Stock_collection_Iname
    FOREIGN KEY (Items_Iname)
    REFERENCES Items (Iname)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

##-- Table Stocks  库存项

CREATE TABLE IF NOT EXISTS Stocks (
  Stockid INT NOT NULL AUTO_INCREMENT, ##--库存项编号
  Stocks_Wid INT NOT NULL,##--库存项所处的仓库号
  Stocks_Iname VARCHAR(100) NOT NULL,##--库存项存储的物品名称
  Stockamount FLOAT NOT NULL,##--库存项存储的物品数量
  Stockarea INT NULL DEFAULT NULL,##--库存项存储在仓库中的区域编号
  Instocktime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,##--库存项创建的时间
  PRIMARY KEY (Stockid),
  INDEX Wid_idx (Stocks_Wid ASC),
  INDEX Pid_idx (Stockid ASC),
  CONSTRAINT Stocks_Wid
    FOREIGN KEY (Stocks_Wid)
    REFERENCES Warehouses (Wid)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT Stocks_Iname
    FOREIGN KEY (Stocks_Iname)
    REFERENCES Items (Iname)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

##-- Table Suppliers 供应商

CREATE TABLE IF NOT EXISTS Suppliers (
  Sid INT NOT NULL AUTO_INCREMENT, ##--供应商编号
  Sname VARCHAR(50) NOT NULL,##--供应商公司姓名
  Scontact VARCHAR(50) NULL DEFAULT NULL,##--供应商的联系人姓名
  Saddress VARCHAR(500) NULL DEFAULT NULL,##--供应商的地址
  Spostcode CHAR(6) NULL DEFAULT NULL,##--供应商的邮编
  Sphone VARCHAR(20) NULL DEFAULT NULL,##--供应商的电话
  Sbank VARCHAR(20) NULL DEFAULT NULL,##--供应商的银行
  Saccount VARCHAR(20) NULL DEFAULT NULL,##--供应商的银行地址
  PRIMARY KEY (Sid))
ENGINE = InnoDB;

##-- Table Inbound 入库单

CREATE TABLE IF NOT EXISTS Inbound (
  Inbound_id INT NOT NULL AUTO_INCREMENT,##--入库单编号
  CreateTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,##--入库单创建时间
  Approver_id INT NULL DEFAULT NULL,##--同意入库的员工编号
  Suppliers_Sid INT NOT NULL,##--供货商编号
  Deliverer VARCHAR(20) NULL,##--送货人姓名
  PRIMARY KEY (Inbound_id),
  INDEX Approver_idx (Approver_id ASC),
  INDEX Warehouse_entry_Suppliers1_idx (Suppliers_Sid ASC),
  CONSTRAINT Inbound_Approver_id
    FOREIGN KEY (Approver_id)
    REFERENCES Staffs (Sid)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT Inbound_Suppliers_Sid
    FOREIGN KEY (Suppliers_Sid)
    REFERENCES Suppliers (Sid)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

##-- Table Suppliers_Order_statistics  供应商的入库单统计

CREATE TABLE IF NOT EXISTS Suppliers_Order_statistics (
  Sid INT NOT NULL,##--供应商的编号
  CreateTime DATETIME NULL DEFAULT NULL, ##--入库单创建时间
  Money DECIMAL(10,2) NULL,##--交易金额
  Inbound_id INT NULL,##--入库单编号
  PRIMARY KEY (Inbound_id),
  INDEX Sid (Sid ASC),
  INDEX fk_Suppliers_Order_statistics_Inbound1_idx (Inbound_id ASC),
  CONSTRAINT Inblound_id
    FOREIGN KEY (Inbound_id)
    REFERENCES Inbound (Inbound_id)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT Sid
    FOREIGN KEY (Sid)
    REFERENCES Suppliers (Sid)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

##-- Table User 用户表

CREATE TABLE IF NOT EXISTS User (
  Username VARCHAR(20) NOT NULL, ##--用户名
  Password VARCHAR(20) NOT NULL,##--密码
  Staffs_Sid int NOT NULL,##--该用户对应的员工编号
  PRIMARY KEY (Username),
  INDEX User_Staff_idx (Staffs_Sid ASC),
  CONSTRAINT User_Staff
    FOREIGN KEY (Staffs_Sid)
    REFERENCES Staffs (sid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

##-- Table Inbound_details 入库单物品详情

CREATE TABLE IF NOT EXISTS Inbound_details (
  Inbound_id INT NOT NULL, ##--入库单编号
  Inbound_Iname VARCHAR(100) NOT NULL,##--入库的物品名称
  Amount FLOAT NULL DEFAULT NULL,##--数量
  Unit_Price DECIMAL(10,2) NULL DEFAULT NULL,##--单价
  Inbound_Stockid INT NULL,##--入库作为库存项存储的库存项编号
  Warehouse_Wid INT NULL,##--仓库编号
  PRIMARY KEY (Inbound_id,Inbound_Iname),
  INDEX Inbound_idx (Inbound_id ASC),
  INDEX Iid_idx (Inbound_Iname ASC),
  INDEX Warehouse_entry_details_Stocks1_idx (Inbound_Stockid ASC),
  CONSTRAINT Inbound_id
    FOREIGN KEY (Inbound_id)
    REFERENCES Inbound (Inbound_id)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT Inbound_Iid
    FOREIGN KEY (Inbound_Iname)
    REFERENCES Items (Iname)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT Inbound_d_stockid
    FOREIGN KEY (Inbound_Stockid)
    REFERENCES Stocks (Stockid)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
   CONSTRAINT Inbound_Warehouse_id
    FOREIGN KEY (Warehouse_Wid)
    REFERENCES Warehouses (Wid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

##-- Table History_Stocks 历史库存项 （全部出库之后，被删除的库存项）

CREATE TABLE IF NOT EXISTS History_Stocks (
  Stockid INT NOT NULL ,##--库存项编号
  Stocks_Wid INT NULL,##--库存项所处的仓库位置
  Stocks_Iname VARCHAR(100) NULL,##--库存项的物品名称
  Stockamount FLOAT NULL,##--库存项的数量
  Stockarea INT NULL,##--库存项存储在仓库中的区域
  Instocktime DATETIME NULL,##--入库的时间
  Outstocktime DATETIME NULL,##--出库的时间
  PRIMARY KEY (Stockid))
ENGINE = InnoDB;

##-- Table Inner_Trasition 内部流转 物品在内部出库入库，比如要进行加工之类的操作，不涉及到客户和供应商

CREATE TABLE IF NOT EXISTS Inner_Trasition (
  Transitionid INT NOT NULL AUTO_INCREMENT,##--内部流转的编号
  I_T_Wid INT NOT NULL,##--涉及到的仓库编号
  Amount FLOAT NOT NULL,##--数量
  Items_Iname VARCHAR(100) NOT NULL,##--物品的名称
  Operate CHAR(1) NULL,##--流转类型 I 入库， O 出库
  Stockid INT NOT NULL,##--涉及到的库存项编号
  Time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, ##--创建时间
  PRIMARY KEY (Transitionid),
  INDEX fk_Inner_trasition_Products1_idx (Items_Iname ASC),
  INDEX I_T_Wid_idx (I_T_Wid ASC),
  CONSTRAINT I_T_Wid
    FOREIGN KEY (I_T_Wid)
    REFERENCES Warehouses (Wid)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT I_T_Iname
    FOREIGN KEY (Items_Iname)
    REFERENCES Items (Iname)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

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