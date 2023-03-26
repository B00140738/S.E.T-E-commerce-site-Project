set foreign_key_checks=0;
DROP TABLE IF EXISTS Cart;
DROP TABLE IF EXISTS PRODUCT;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS User_has_product;

DROP TABLE IF EXISTS Orders;
DROP TABLE IF EXISTS Order_has_Product;
DROP TABLE IF EXISTS Transactions;

set foreign_key_checks=1;

 use Ecommerce;

CREATE TABLE Cart (
 CartID           INT NOT NULL auto_increment,
 product_name         VARCHAR(50),

CONSTRAINT Cart_CartID_PK PRIMARY KEY (CartID));

INSERT INTO Cart (CartID) VALUES (20);
INSERT INTO Cart (CartID) VALUES (23);

CREATE TABLE Orders (
 OrderID          INT NOT NULL,
 Shipping_cost    VARCHAR(50),
 Quantity         VARCHAR(50),
 product_name     VARCHAR(50),
 RegisterStatus   VARCHAR(50),

CONSTRAINT Orders_OrderID_PK PRIMARY KEY (OrderID));

CREATE TABLE Product (
 ProductID           INT NOT NULL auto_increment,
 Style               VARCHAR(50),
 Artist_name         VARCHAR(50),
 price            	 VARCHAR(50),
 product_name        VARCHAR(50),
 description         VARCHAR(50),
 CartID				 INT NOT NULL,
 
CONSTRAINT Product_Product_CartID_FK FOREIGN KEY (CartID) REFERENCES Cart (CartID),
CONSTRAINT Product_ProductID_PK PRIMARY KEY (ProductID));

INSERT INTO Product (ProductID, Style, Artist_name, price, product_name, description, CartID) VALUES (7833,'KING','PRESIDENT',7843,NULL,'DSFDSSFF',20);
INSERT INTO Product (ProductID, Style, Artist_name, price, product_name, description, CartID) VALUES (7698,'BLAKE','MANAGER',7842, NULL,'FDGGDDFG',23);


CREATE TABLE Users (
 UsersID           INT NOT NULL auto_increment,
 user_name         VARCHAR(50),
 password         VARCHAR(50),
 Email         		VARCHAR(50),
 phone_number       VARCHAR(50),
 Address        	VARCHAR(50),
 user_types         VARCHAR(50),

 CONSTRAINT Users_UsersID_PK PRIMARY KEY (UsersID));

CREATE TABLE User_has_product (
 User_has_productID          	INT NOT NULL auto_increment,
 Style              			VARCHAR(50),
 Artist_name       				VARCHAR(50),
 price            				VARCHAR(50),
 product_name       			VARCHAR(50),
 description        			VARCHAR(50),
ProductID 					INT NOT NULL,
 UsersID 		   				INT NOT NULL,
 
 CONSTRAINT User_has_product_ProductID_FK FOREIGN KEY (ProductID) REFERENCES Product (ProductID),
 CONSTRAINT User_has_product_UsersID_FK FOREIGN KEY (UsersID) REFERENCES Users (UsersID),
 CONSTRAINT User_has_product_User_has_productID_PK PRIMARY KEY (User_has_productID));


CREATE TABLE Order_has_Product (
 Order_has_ProductID          INT NOT NULL auto_increment,
 OrderID 		   INT NOT NULL,
 ProductID 		   INT NOT NULL,
 CONSTRAINT Order_has_Product_OrderID_FK FOREIGN KEY (OrderID) REFERENCES Orders (OrderID),
 CONSTRAINT Order_has_Product_ProductID_FK FOREIGN KEY (ProductID) REFERENCES Product (ProductID),
 CONSTRAINT Order_has_Product_Order_has_ProductID_PK PRIMARY KEY (Order_has_ProductID));


