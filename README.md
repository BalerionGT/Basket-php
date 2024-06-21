E-Commerce Application README
This document provides an overview of the database structure and functionality of the e-commerce application.

Database Structure
Tables
offers

Description: Contains information about the offers available in the system.
Columns: (List columns here, e.g., offer_id, offer_name, offer_description, etc.)
orders

Description: Stores details about customer orders.
Columns: (List columns here, e.g., order_id, customer_id, order_date, etc.)
order_products

Description: Maps products to orders and stores quantities.
Columns: (List columns here, e.g., order_id, product_id, quantity, etc.)
products

Description: Holds information about the products available for purchase.
Columns: (List columns here, e.g., product_id, product_name, price, etc.)
Assumptions
Single Order per Cart Assumption:
It is assumed that each cart can only have one active order at a time. This simplifies the management of orders and ensures clarity in tracking customer purchases.
PHP Files Overview
order.php

Description: Responsible for inserting purchased items into the order_products table and updating quantities in the orders table.
Usage: Typically invoked when a user confirms their purchase.
delivery.php

Description: Displays delivery rules and policies for orders.
Usage: Provides customers with information on shipping methods, costs, and delivery timelines.
offer.php

Description: Retrieves and displays current offers available from the database.
Usage: Shows customers discounts or promotions applicable to their purchases.
total.php

Description: Calculates the total cost of items in the current order.
Usage: Used during checkout to display the total amount due, including taxes and any applicable discounts.
main.php

Description: Contains the main user interface for the application, integrating functionality from other PHP files.
Usage: Provides navigation and interaction points for customers to browse products, add them to the cart, and proceed to checkout.
Workflow Overview
Order Generation:

Orders are typically generated when a user clicks a purchase button, triggering the order.php script to record the transaction details.
Offer Display:

The offer.php script fetches and displays relevant offers or discounts from the database, enhancing customer shopping experience.
Total Calculation:

Upon checkout, total.php calculates the total cost of items in the cart, including any applicable taxes and discounts.
Delivery Information:

delivery.php provides users with clear guidelines on delivery options, fees, and expected delivery times.
Additional Notes
Ensure that database connections and configurations are appropriately managed in each PHP file to maintain security and efficiency.
Continuous testing and validation of database operations and PHP scripts are recommended to ensure smooth functionality.
