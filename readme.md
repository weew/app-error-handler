# Error handling component

[![Build Status](https://img.shields.io/travis/weew/php-app-error-handler.svg)](https://travis-ci.org/weew/php-app-error-handler)
[![Code Quality](https://img.shields.io/scrutinizer/g/weew/php-app-error-handler.svg)](https://scrutinizer-ci.com/g/weew/php-app-error-handler)
[![Test Coverage](https://img.shields.io/coveralls/weew/php-app-error-handler.svg)](https://coveralls.io/github/weew/php-app-error-handler)
[![Version](https://img.shields.io/packagist/v/weew/php-app-error-handler.svg)](https://packagist.org/packages/weew/php-app-error-handler)
[![Licence](https://img.shields.io/packagist/l/weew/php-app-error-handler.svg)](https://packagist.org/packages/weew/php-app-error-handler)

## Table of contents

- [Installation](#installation)
- [Introduction](#introduction)
- [Usage](#usage)

## Installation

`composer require weew/php-app-error-handler`

## Introduction

This is an integration of the [weew/php-error-handler](https://github.com/weew/php-error-handler) library in to the [weew/php-app](https://github.com/weew/php-app) framework.

## Usage

To enable this provider simply register it on the kernel.

```php
$app->getKernel()->addProviders([
    ErrorHandlingProvider::class.
]);
```
