# Product Feeder
The Product Feeder API offers various data formats, including JSON and XML, to provide users with access to the complete range of products within the system.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Examples](#examples)
- [Contributing](#contributing)
- [License](#license)

## Installation
To use Product Feeder, you need to have Docker installed on your machine. If you haven't already, you can download and install it from the [official Docker website](https://www.docker.com/).
1. Open your terminal or command prompt.
2. Clone the **Product Feeder** repository to your computer.
```sh
git clone https://github.com/devmisterio/product-feeder.git
```
3. Go inside the folder. Then build image and start containers.
```sh
docker-compose up --build
```
**Note:** After the db container is running, ```init.sql``` in the ```migraitons``` folder is run to fill the data into the database.

**Note:** The ports on which web applications that are run in docker-compose will run are specified in this file. If these ports are used on your computer, you can change them before running docker-compose.

## Usage
Your HTTP request must include these headers:
- **Authentication-Token:** Each user must be provided with a unique authentication key. Using an incorrect authentication key will result in an ```"Invalid Authentication Token"``` response.
- **Accept:** Determines which data format the application will return. For example, you can use ```"application/json"``` or ```"application/xml"```.

#### To Get Data in JSON Format:
```bash
curl --location 'http://localhost:8000/products' \
--header 'Authentication-Token: 5fb46291261a90d3c12d8da28abeca74' \
--header 'Accept: application/json'
```

#### To Get Data in XML Format:
```bash
curl --location 'http://localhost:8000/products' \
--header 'Authentication-Token: 5fb46291261a90d3c12d8da28abeca74' \
--header 'Accept: application/xml'
```

**Note:** The Authentication Token is located in the ```companies``` table in the database, in the ```api_key``` column. You can get these tokens from there.

**Note:** You can access the database via **phpMyAdmin** at ```http://localhost:8081``` (username: user, password: password).

## Examples

#### JSON Output:
```json
[
    {
        "id": 1,
        "name": "Smartphone",
        "price": "699.99",
        "category": "Electronic"
    },
    {
        "id": 2,
        "name": "Laptop",
        "price": "1199.99",
        "category": "Electronic"
    },
    {
        "id": 3,
        "name": "Tablet",
        "price": "349.99",
        "category": "Electronic"
    },
    ".... Other Products"
]
```

#### XML Output:
```xml
<?xml version="1.0" encoding="UTF-8"?>
<data>
    <item>
        <id>1</id>
        <name>Smartphone</name>
        <price>699.99</price>
        <category>Electronic</category>
    </item>
    <item>
        <id>2</id>
        <name>Laptop</name>
        <price>1199.99</price>
        <category>Electronic</category>
    </item>
    <item>
        <id>3</id>
        <name>Tablet</name>
        <price>349.99</price>
        <category>Electronic</category>
    </item>
    <!-- Other Products -->
</data>
```

## Contributing
Contributions are welcome! If you find a bug or have an idea for improvement, please open an issue or submit a pull request.

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them.
4. Push your changes to your fork.
5. Open a pull request to the main repository.

## License
This project is licensed under the GNU GPL. See the [LICENSE](LICENSE) file for details.
