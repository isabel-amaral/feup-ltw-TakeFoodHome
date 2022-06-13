PRAGMA foreign_keys = ON;

DROP TABLE if EXISTS DishFoodOrder;
DROP TABLE if EXISTS ReviewResponse;
DROP TABLE if EXISTS Review;
DROP TABLE if EXISTS FoodOrder;
DROP TABLE if EXISTS Dish;
DROP TABLE if EXISTS Restaurant;
DROP TABLE if EXISTS User;


CREATE TABLE User(
    userID          INTEGER PRIMARY KEY,
    username        VARCHAR(16) UNIQUE NOT NULL,
    password        VARCHAR(40) NOT NULL,
    name            VARCHAR(32) NOT NULL,
    email           TEXT NOT NULL,
    phoneNumber     CHAR(9) NOT NULL,
    address         TEXT NOT NULL,
    owner           BOOLEAN DEFAULT 0,
    courier         BOOLEAN DEFAULT 0
);

CREATE TABLE Restaurant(
    restaurantID    INTEGER PRIMARY KEY,
    name            VARCHAR(32) UNIQUE NOT NULL,
    description     VARCHAR(500) DEFAULT 'The owner has not provided a description for this restaurant yet.',
    address         VARCHAR(64) UNIQUE NOT NULL,
    email           VARCHAR(32),
    phoneNumber     CHAR(9) NOT NULL,
    category        VARCHAR(16),
    ownerID         INTEGER REFERENCES USER(userID)
);

CREATE TABLE Dish(
    dishID          INTEGER PRIMARY KEY,
    name            VARCHAR(32) NOT NULL,
    description     TEXT NOT NULL,
    price           FLOAT NOT NULL,
    picture        TEXT NOT NULL,
    category        VARCHAR(32) NOT NULL,
    restaurantID    INTEGER REFERENCES Restaurant(restaurantID)
);

CREATE TABLE FoodOrder(
    orderID         INTEGER PRIMARY KEY,
    date            DATE NOT NULL,
    state           VARCHAR(10) DEFAULT 'Received',
    restaurantID    INTEGER REFERENCES Restaurant(restaurantID),
    customerID      INTEGER REFERENCES User(userID)
);

CREATE TABLE Review(
    reviewID        INTEGER PRIMARY KEY,
    comment         TEXT NOT NULL,
    date            DATE NOT NULL,
    customerID      INTEGER REFERENCES User(userID),
    restaurantID    INTEGER REFERENCES Restaurant(restaurantID)
);

CREATE TABLE ReviewResponse(
    reviewresponseID INTEGER PRIMARY KEY,
    comment         TEXT NOT NULL,
    date            DATE NOT NULL,
    reviewID        INTEGER REFERENCES Review(reviewID),
    ownerID         INTEGER REFERENCES User(userID)
);

CREATE TABLE DishFoodOrder(
    dishfoodorderID INTEGER PRIMARY KEY,
    dishID          INTEGER REFERENCES Dish(dishID),
    orderID         INTEGER REFERENCES FoodOrder(orderID)
    
);

--INSERTS-------------------------------------------------------------

--USERS---------------------------------------------------------------
INSERT INTO User (userID,username,password,name,email,phoneNumber,address) VALUES(
    1,
    'isabel123',
    '6adfb183a4a2c94a2f92dab5ade762a47889a5a1', --helloworld
    'Isabel Amaral',
    'email@email.com',
    '987654321',
    'street 9'
);

INSERT INTO User (userID,username,password,name,email,phoneNumber,address,owner) VALUES(
    2,
    'firstowner',
    '6adfb183a4a2c94a2f92dab5ade762a47889a5a1', --helloworld
    'Mr. First Restaurant Owner',
    'email@email.com',
    '987654321',
    'street 9',
    TRUE
);

INSERT INTO User (userID,username,password,name,email,phoneNumber,address,owner) VALUES(
    3,
    'secondowner',
    '6adfb183a4a2c94a2f92dab5ade762a47889a5a1', --helloworld
    'Mr. Second Restaurant Owner',
    'email@email.com',
    '987654321',
    'street 9',
    TRUE
);

--RESTAURANTS---------------------------------------------------------
INSERT INTO Restaurant VALUES(
    1,
    'Bistro Bazaar',
    'Restaurant perfect for families. Kids from all ages are welcome, big tables and food for every taste.',
    'Rua Dr. Roberto Frias, 35',
    'bistrobazzaar@gmail.com',
    '225081401',
    'Family Style',
    2
);

INSERT INTO Restaurant VALUES(
    2,
    'Grandma Sweets',
    'Dedicated to serving delicious handmade cupcakes, cakes, cheesecakes and cookies as tasty as the ones from your grandmother.',
    'Rua Dr. Roberto Frias, 37',
    'grandmasweets@gmail.com',
    '225081402',
    'Desert',
    2
);

INSERT INTO Restaurant VALUES(
    3,
    'Eatery Hotspot',
    'The Eatery Hotspot was born out of love and respect for these humble deli creations, met with a desire to bring quality ingredients to the table.',
    'Rua Dr. Roberto Frias, 39',
    'eateryhotspot@gmail.com',
    '225081403',
    'Family Style',
    3
);

INSERT INTO Restaurant VALUES(
    4,
    'Salty Squid',
    'All of our menu items are inspired by portuguese cuisine. Not only do we have fresh flown-in seafood from the northeast,
     but we also have a variety of traditional fish dishes to serve to you.',
    'Rua das Flores, 12',
    'saltysquid@gmail.com',
    '225081404',
    'Seafood',
    2
);

INSERT INTO Restaurant VALUES(
    5,
    'Mediterra Seafood',
    'Mediterra Seafood is a comfortable restaurant offering everything you love about mediterranean cuisine including the hospitality.',
    'Rua de Santo António, 5',
    'mediterraseafood@gmail.com',
    '225081405',
    'Seafood',
    2
);

INSERT INTO Restaurant VALUES(
    6,
    'Veganic Corner',
    'Veganic Corner pushes the envelope of vegetarian cuisine. Taking its influences from our team members culinary roots, Veganic Corner blends
     traditional and innovative techniques to create unique offerings using local ingredients in all of its dishes.',
    'Rua de Santo António, 78',
    'veganicorner@gmail.com',
    '225081406',
    'Vegetarian',
    3
);

INSERT INTO Restaurant VALUES(
    7,
    'Sweet Escape',
    'Sweet Escape is a leading commercial bakery creating handcrafted breads and sweet treats from the finest ingredients.',
    'Rua Sá da Bandeira, 48',
    'sweetescape@gmail.com',
    '225081402',
    'Desert',
    2
);


--DISH----------------------------------------------------------------

INSERT INTO Dish VALUES(
    1,
    'Neapolitan Pizza',
    'This is just a Pizza',
    22.50,
    'dish1.png',
    'Pizza',
    1
);

INSERT INTO Dish VALUES(
    2,
    'Pasta',
    'Pasta',
    5.60,
    'dish2.png',
    'Pasta',
    1
);

INSERT INTO Dish VALUES(
    3,
    'Burger',
    'Burger',
    22.50,
    'dish3.png',
    'Burger',
    2
);

INSERT INTO Dish VALUES(
    4,
    'Cheese Pizza',
    'This is just a Pizza',
    22.50,
    'dish4.png',
    'Pizza',
    1
);

INSERT INTO Dish VALUES(
    5,
    'Veggie Pizza',
    'This is just a Pizza',
    22.50,
    'dish5.png',
    'Pizza',
    1
);

INSERT INTO Dish VALUES(
    6,
    'Pepperoni Pizza',
    'This is just a Pizza',
    22.50,
    'dish6.png',
    'Pizza',
    1
);

--FOODORDER--------------------------------------------------------------

INSERT INTO FoodOrder VALUES(
    1,
    '2022-11-05',
    'Received',
    1,
    1
);

INSERT INTO FoodOrder VALUES(
    2,
    '2022-06-20',
    'Received',
    1,
    3
);

INSERT INTO FoodOrder VALUES(
    3,
    '2022-08-16',
    'Ready',
    4,
    2
);

INSERT INTO FoodOrder VALUES(
    4,
    '2022-11-05',
    'Received',
    1,
    1
);


--REVIEW--------------------------------------------------------------

INSERT INTO Review VALUES(
    1,
    "yes very good restaurant",
    '2022-01-08',
    2,
    2
);

INSERT INTO Review VALUES(
    2,
    "yes very good restaurant",
    '2022-01-08',
    3,
    3
);

INSERT INTO Review VALUES(
    3,
    "yes very good restaurant",
    '2022-01-08',
    1,
    1
);

--REVIEWRESPONSE--------------------------------------------------------------

INSERT INTO ReviewResponse VALUES(
    1,
    "good review",
    '2022-05-11',
    1,
    2
);

INSERT INTO ReviewResponse VALUES(
    2,
    "good review",
    '2022-05-09',
    1,
    2
);

INSERT INTO ReviewResponse VALUES(
    3,
    "good review",
    '2022-05-10',
    1,
    2
);


--Dish-FoodOrder--------------------------------------------------------------

INSERT INTO DishFoodOrder (dishID,orderID) VALUES(
    1,
    1
);

INSERT INTO DishFoodOrder (dishID,orderID) VALUES(
    2,
    1
);

INSERT INTO DishFoodOrder (dishID,orderID) VALUES(
    4,
    1
);

INSERT INTO DishFoodOrder (dishID,orderID) VALUES(
    1,
    4
);

INSERT INTO DishFoodOrder (dishID,orderID) VALUES(
    2,
    4
);

INSERT INTO DishFoodOrder (dishID,orderID) VALUES(
    4,
    4
)
