# sale-system

System to manage sales.

## Docker

- To use docker environment, access: https://github.com/matheusreis1/sale-system-docker

## Requirements

- PHP >= 7.2
- MySQL >= 5.7
- Apache

## Create Database

- To create database run the follow command:
    ```
    bash create_database.sh -u YOUR_MYSQL_USER
    ```
    Then, put your MySQL password.

## Routes

- Initial screen: /sale-system/public/

#### Products

- List: /sale-system/public/products/

- Add: /sale-system/public/products/add.php

- Edit: /sale-system/public/products/edit.php?id={id}

- Delete: /sale-system/public/products/delete.php?id={id}

- View : /sale-system/public/products/view.php?id={id}

#### Sellers

- List: /sale-system/public/sellers/

- Add: /sale-system/public/sellers/add.php

- Edit: /sale-system/public/sellers/edit.php?id={id}

- Delete: /sale-system/public/sellers/delete.php?id={id}

- View : /sale-system/public/sellers/view.php?id={id}

#### Sales

- List: /sale-system/public/sales/

- Add: /sale-system/public/sales/add.php

- Edit: /sale-system/public/sales/edit.php?id={id}

- Delete: /sale-system/public/sales/delete.php?id={id}

- View : /sale-system/public/sales/view.php?id={id}
