# PHP TechStore - VedruTech

**Description:**

This project is an e-commerce platform designed to offer an intuitive and efficient shopping experience. It allows users to explore products, add them to the shopping cart, place orders, and manage their profiles. The project architecture is based on an MVC (Model-View-Controller) structure to ensure modularity and easy maintenance.

## Features

- Products and service display 🛍️
- User edit ✏️
- Login 🔐
- Shopping cart 🛒
- Cookies 🍪
- User roles: admin, regular user 👤👥

## Technologies Used

- HTML ![HTML](https://img.icons8.com/color/48/000000/html-5.png)
- CSS ![CSS](https://img.icons8.com/color/48/000000/css3.png)
- PHP ![PHP](https://img.icons8.com/officel/48/000000/php-logo.png)
- MySQL ![MySQL](https://img.icons8.com/nolan/48/000000/mysql.png)
- Bootstrap ![Bootstrap](https://img.icons8.com/color/48/000000/bootstrap.png)

## Controllers

- **AboutUsController.php** 📄 - Controller for the "About Us" page.
  - Manages the logic related to the "About Us" page, providing information about the company, its mission, vision, and values. Allows users to learn more about the history and the team behind the platform.

- **CarritoDisplayController.php** 📄 - Cart display controller.
  - Controls the visualization and presentation of products in the shopping cart. Offers functions to view, add, and remove products from the cart, providing a smooth shopping experience.

- **CartController.php** 📄 - Controller for shopping cart management.
  - Manages the manipulation of the shopping cart, allowing users to add, remove, and update products in the shopping list. Coordinates the interaction between the cart view and the corresponding model.

- **CategoryController.php** 📄 - Controller for the management of product categories.
  - Manages the logic related to the administration of product categories, facilitating the classification and organization of products in the catalog. Allows administrators to add, edit, and delete categories.

- **CheckoutController.php** 📄 - Controller for the payment and order completion process.
  - Directs the flow, inserts CartItems and OrderDetails into de database. Completes the order.

- **CookieController.php** 📄 - Controller for cookie management.
  - Manages the creation and management of cart cookie. It stores the item id, the type and the quanity

- **EditUserController.php** 📄 - Controller for user information editing.
  - Allows users to edit and update their personal information, such as name, address, or preferences. Implements validations to ensure the integrity of user data.

- **ProductCrudController.php && ServiceCrudController.php** 📄 - Controller for user information editing.
  - Allows admins to edit and update products and services data.

## Models

- **Employee.php** 📄 - Model to represent an employee.
  - Contains attributes and methods related to employee information, such as name, position, and contact details.

- **Item.php** 📄 - Model to represent an item in the cart.
  - Stores information about the products selected by the user in the shopping cart, including details such as quantity and unit price.

- **Order.php** 📄 - Model to represent a purchase order.
  - Captures details of an order, including products, total cost, customer information, and order status.

- **Product.php** 📄 - Model to represent a product in the catalog.
  - Contains attributes related to product information, such as name, description, price, and category.

- **Service.php** 📄 - Model to represent a offered service.
  - Includes attributes and methods related to services provided by the platform.

- **User.php** 📄 - Model to represent a user registered on the platform.
  - Stores information about users, such as name, email address, password, and account details.

## Scripts and Implementations

- **datainsert.php** 📄 - Script to insert test data into the database.
  - Facilitates the initial loading of sample data into the database for development and testing purposes.

- **datainsert2.php** 📄 - Another script to insert additional data into the database.
  - Provides supplementary data to enrich the variety and complexity of information stored in the database.

- **datainsert3.php** 📄 - A third script to insert relevant data into the database.
  - Offers specific data that may be necessary for test cases or to demonstrate specific features of the application.

- **employeeImpl.php** 📄 - Implementation of functions for employee management.
  - Contains business logic related to the manipulation of employee data, such as adding, editing, and deleting records.

- **enviarCorreo.php** 📄 - Script to send emails.
  - Allows the automation of email sending, such as order confirmations or notifications of changes to the user account.

- **orderImpl.php** 📄 - Implementation of functions for the management of purchase orders.
  - Contains logic to process and manipulate orders, including cost calculations, inventory updates, and confirmation generation.

- **productImpl.php** 📄 - Implementation of functions for the management of products in the database.
  - Provides methods to interact with the database in relation to products, such as search, update, and deletion.

- **serviceImpl.php** 📄 - Implementation of functions for the management of offered services.
  - Contains logic to handle operations related to services, such as adding new services and updating related information.

- **userImpl.php** 📄 - Implementation of functions for the management of users in the database.
  - Provides methods to perform CRUD operations (Create, Read, Update, Delete) on user records stored in the database.


## Usage

Detailed explanation of how to use the different controllers and functions of the project. Provides practical examples to guide users and developers through the main features and workflows of the application.
