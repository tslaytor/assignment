# assignment
This is a task assignment I was set for a junior web developer role, and was offered the job for :D

You can see the finished project live here: https://tslaytor-assignment.000webhostapp.com/

Requirements:

Create a e-commerce site that sells 3 types of products: books, DVDs, and furniture.
The site should have 2 pages, a product listing page and a create product page.
Write the server side in PHP, using OOP principles to handle differences in the logic and behavoir
- Use classes that extend each other, including an abstract class for the main product logic.
- Avoid using conditional statements for handling differences in product types
- Do not use different endpoints for different products types. There should be 1 general endpoint for product saving
Procedural PHP code is only allowed to initialise classes. All other logic must be placed within class methods.

MySQL logic should be handled by objects with properties instead of direct column values. 

## Product List Page 
Products should be sorted by primary key in database, not split by product types

### All products have the following:

- SKU (unique for each product)
- Name
- Price in $
- One of the product-specific attributes and its value
    - Size (MB) for DVD
    - Weight (Kg) for Book
    - Dimensions (Height(cm) x Width(cm) x Length(cm) ) for Furniture

### Required UI elements:

- “ADD” button, which leads to the “Product Add” page
- Checkboxes next to each product and a button “MASS DELETE” triggering delete action for the selected products.

## Add Product Page

### The page should display a form with the following fields:

- SKU
- Name
- Price

- Product type switcher with following options:
    - DVD
    - Book
    - Furniture
    
- Product type-specific attribute
    - Size input field for DVD 
    - Weight input field for Book
    - Each from Dimensions input fields for Furniture

<img width="1449" alt="image" src="https://user-images.githubusercontent.com/22756687/224577783-141f749f-18f0-457a-8c00-8ee4512b6133.png">

<img width="1462" alt="image" src="https://user-images.githubusercontent.com/22756687/224577798-8a5b0a0c-9547-4a58-a33a-0d5cfb425732.png">

  
