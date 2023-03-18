DROP TABLE IF EXISTS PRODUCT;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS User_has_product;

DROP TABLE IF EXISTS Orders;
DROP TABLE IF EXISTS Order_has_Product;
DROP TABLE IF EXISTS Transactions;

USE ECOMMERCE;

CREATE TABLE Product (
 ProductID           INT NOT NULL,
 Style               VARCHAR(50),
 Artist_name         VARCHAR(50),
 price            	 VARCHAR(50),
 product_name        VARCHAR(50),
 description         VARCHAR(50),

 CONSTRAINT Product_ProductID_PK PRIMARY KEY (ProductID));

INSERT INTO Product VALUES (7839,'KING','PRESIDENT',NULL,NULL,10);
INSERT INTO Product VALUES (7698,'BLAKE','MANAGER',7839,NULL,30);
INSERT INTO Product VALUES (7782,'CLARK','MANAGER',7839,NULL,10);
INSERT INTO Product VALUES (7566,'JONES','MANAGER',7839,NULL,20);
INSERT INTO Product VALUES (7654,'MARTIN','SALESMAN',7698,1400,30);
INSERT INTO Product VALUES (7499,'ALLEN','SALESMAN',7698,300,30);

CREATE TABLE Orders (
 OrderID          INT NOT NULL,
 Shipping_cost    VARCHAR(50),
 Quantity         VARCHAR(50),
 product_name     VARCHAR(50),
 RegisterStatus   VARCHAR(50),

CONSTRAINT Orders_OrderID_PK PRIMARY KEY (OrderID));

CREATE TABLE Users (
 UsersID           INT NOT NULL,
 phone_number       VARCHAR(50),
 Address        	VARCHAR(50),
 user_types         VARCHAR(50),
 LoginStatus        VARCHAR(50),
 Email         		VARCHAR(50),
 user_name         VARCHAR(50),
 name        		VARCHAR(50),
  OrderID 		   INT NOT NULL,

 CONSTRAINT Users_Users_OrderID_FK  FOREIGN KEY (OrderID) REFERENCES Orders (OrderID),
 CONSTRAINT Users_UsersID_PK PRIMARY KEY (UsersID));



CREATE TABLE User_has_product (
 User_has_productID           INT NOT NULL,
 Style               VARCHAR(50),
 Artist_name         VARCHAR(50),
 price            	 VARCHAR(50),
 product_name        VARCHAR(50),
 description         VARCHAR(50),
  ProductID 		   INT NOT NULL,
 UsersID 		   INT NOT NULL,
 
 CONSTRAINT User_has_product_ProductID_FK FOREIGN KEY (ProductID) REFERENCES Product (ProductID),
 CONSTRAINT User_has_product_UsersID_FK FOREIGN KEY (UsersID) REFERENCES Users (UsersID),
 CONSTRAINT User_has_product_User_has_productID_PK PRIMARY KEY (User_has_productID));





CREATE TABLE Order_has_Product (
 Order_has_ProductID          INT NOT NULL,
 OrderID 		   INT NOT NULL,
 ProductID 		   INT NOT NULL,
 CONSTRAINT Order_has_Product_OrderID_FK FOREIGN KEY (OrderID) REFERENCES Orders (OrderID),
 CONSTRAINT Order_has_Product_ProductID_FK FOREIGN KEY (ProductID) REFERENCES Product (ProductID),
 CONSTRAINT Order_has_Product_Order_has_ProductID_PK PRIMARY KEY (Order_has_ProductID));



CREATE TABLE Transactions (
TransactionsID           INT NOT NULL,
Total   VARCHAR(50),
 OrderID 		   INT NOT NULL,
 CONSTRAINT Transactions_OrderID_FK FOREIGN KEY (OrderID) REFERENCES Orders (OrderID),
 CONSTRAINT TransactionsID_TransactionsID_PK PRIMARY KEY (TransactionsID));




