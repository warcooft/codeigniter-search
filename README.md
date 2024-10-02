# Codeigniter Search
Rapid Search for Codeigniter 4 framework

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-%5E4.4.8-blue)
![PHP Version Require](https://img.shields.io/badge/PHP-%5E8.0-blue)

## Installation

```
composer require aselsan/search
```

## Usage
`use SearchTrait` in your model, as follows:
```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    use SearchTrait; //Add this

    // Optional properties
    protected $search = ['first_name', 'last_name'];
```

Somewhere in your controller

```php
$keyword = "jhon doe";

// Match any fields
model(UserModel::class)->search($keyword)->paginate();

// Match all fields
model(UserModel::class)->search($keyword, true)->paginate();
```

## License

This project is licensed under the MIT License - see the [LICENSE](/LICENSE) file for details.

