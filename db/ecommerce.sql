USE ecommerce;

CREATE TABLE User (
                      userID INT NOT NULL AUTO_INCREMENT,
                      name VARCHAR(50) NOT NULL,
                      user_name VARCHAR(50) NOT NULL,
                      password VARCHAR(255) NOT NULL,
                      PRIMARY KEY (userID)
);

CREATE TABLE Product (
                         id INT NOT NULL AUTO_INCREMENT,
                         name VARCHAR(50) NOT NULL,
                         description text NOT NULL,
                         price DECIMAL(10, 2) NOT NULL,
                         img text NOT NULL,
                         PRIMARY KEY (id)
);

INSERT INTO `Product` (`id`, `name`, `description`, `price`, `img`) VALUES
                                                                        (1, 'Girl with the pearl earring', '<p>A timeless classic.', '199.99', 'earring.jpg'),
                                                                        (2, 'Rains Rustle', '', '14.99', 'Rains-Rustle.jpg'),
                                                                        (3, 'Starry Night', '', '19.99', 'background-image.jpg'),
                                                                        (4, 'Sunflowers', '', '69.99', 'sunflowers.jpg');

CREATE TABLE Cart (
                      cartID INT NOT NULL AUTO_INCREMENT,
                      userID INT NOT NULL,
                      productID INT NOT NULL,
                      quantity INT NOT NULL,
                      PRIMARY KEY (cartID),
                      FOREIGN KEY (userID) REFERENCES User(userID),
                      FOREIGN KEY (productID) REFERENCES Product(id)
);

CREATE TABLE Transaction (
                             transactionID INT NOT NULL AUTO_INCREMENT,
                             productID INT NOT NULL,
                             productName VARCHAR(50) NOT NULL,
                             productDescription VARCHAR(255) NOT NULL,
                             quantity INT NOT NULL,
                             PRIMARY KEY (transactionID),
                             FOREIGN KEY (productID) REFERENCES Product(id)
);
