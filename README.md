## UK-Mobile-Validator

[![Build Status](https://travis-ci.org/fastwebmedia/UK-Mobile-Validator.svg?branch=master)](https://travis-ci.org/fastwebmedia/UK-Mobile-Validator)

## Installation

```
composer require fastwebmedia/uk-mobile-validator
```

## Usage

```php
$isValid = UKMobileValidator::validMobileNumber($mobileNumber);

if ($isValid) {
    echo 'I am valid';
} else {
    echo 'I am invalid';
}    
```