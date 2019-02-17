# Server Planning

This project generated for solving server scaling needs.

## Server Requirements*
```
PHP >= 7.0
```

# Install package.

## Via GIT Clone
```
git clone https://github.com/FG-Developer/server-planning-first-fit.git
cd server-planning-first-fit
composer install
```
## Generate as project via composer
For install this project, you can use composer package manager. Please run following code for install.
```
composer create-project server-planning/first-fit:dev-master@dev
```

## Get as package via composer
For install this project, you can use composer package manager. Please run following code for install.
```
composer require "server-planning/first-fit:dev-master@dev"
composer install
```

## Example

```php
require 'vendor/autoload.php';

use SP\{ServerDetails, Server, VM, FittingServer};

$serverDetails = new ServerDetails(12, 64, 500);
$vm1 = new VM(6, 32, 250);
$vm2 = new VM(6, 32, 255);
$vm3 = new VM(6, 32, 255);

$vms = compact(['vm1', 'vm2', 'vm3']);
$fitting = new FittingServer();

$calculate = $fitting->calculate($serverDetails, $vms);
echo $calculate;

```
