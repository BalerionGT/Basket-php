# E-Commerce Application README

This document provides an overview of the database structure and functionality of the e-commerce application.

## Database Structure

### Tables

1. **offers**
   - **offer_id** (Primary Key): Unique identifier for each offer.
   - **description**: Description of the offer.
   - **product_code** (Index): Code of the product associated with the offer.
   - **buy_quantity**: Quantity of products required to trigger the offer.
   - **get_quantity**: Quantity of products customers receive as part of the offer.
   - **discount_percentage**: Percentage discount applied as part of the offer.
   - **start_date**: Start date of the offer validity.
   - **end_date**: End date of the offer validity.

2. **orders**
   - **order_id** (Primary Key): Unique identifier for each order.
   - **customer_id**: Identifier for the customer placing the order.
   - **order_date**: Date when the order was placed.

3. **order_products**
   - **order_id** (Foreign Key): References the order to which the product belongs.
   - **product_code**: Code of the product added to the order.
   - **quantity**: Quantity of the product added to the order.

4. **products**
   - **product_code** (Primary Key): Unique identifier for each product.
   - **product_name**: Name of the product.
   - **price**: Price of the product.

## Assumptions

1. **Cart Assumption:**
   - In order table I've created an element with the id 1 that was my order test , normally there will be an order button where the user can creat an order that it will be inserted in the database, with the custumer id.
## PHP Files Overview

1. **order.php**
   - Description: Responsible for inserting purchased items into the `order_products` table and updating quantities in the `orders` table.
   - Usage: Typically invoked when a user confirms their purchase.

2. **delivery.php**
   - Description: Displays delivery rules and policies for orders.
   - Usage: Provides customers with information on shipping methods, costs, and delivery timelines.

3. **offer.php**
   - Description: Retrieves and displays current offers available from the database.
   - Usage: Shows customers discounts or promotions applicable to their purchases.

4. **total.php**
   - Description: Calculates the total cost of items in the current order.
   - Usage: Used during checkout to display the total amount due, including taxes and any applicable discounts.

5. **main.php**
   - Description: Contains the main user interface for the application, integrating functionality from other PHP files.
   - Usage: Provides navigation and interaction points for customers to browse products, add them to the cart, and proceed to checkout.

## Workflow Overview

1. **Order Generation:**
   - Orders are typically generated when a user clicks a purchase button, triggering the `order.php` script to record the transaction details.

2. **Offer Display:**
   - The `offer.php` script fetches and displays relevant offers or discounts from the database, enhancing customer shopping experience.

3. **Total Calculation:**
   - Upon checkout, `total.php` calculates the total cost of items in the cart, including any applicable taxes and discounts.

4. **Delivery Information:**
   - `delivery.php` provides users with clear guidelines on delivery options, fees, and expected delivery times.

## Additional Notes

- Ensure that database connections and configurations are appropriately managed in each PHP file to maintain security and efficiency.
- Continuous testing and validation of database operations and PHP scripts are recommended to ensure smooth functionality.
