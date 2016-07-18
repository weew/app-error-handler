# Error handling component

[![Build Status](https://img.shields.io/travis/weew/app-error-handler.svg)](https://travis-ci.org/weew/app-error-handler)
[![Code Quality](https://img.shields.io/scrutinizer/g/weew/app-error-handler.svg)](https://scrutinizer-ci.com/g/weew/app-error-handler)
[![Test Coverage](https://img.shields.io/coveralls/weew/app-error-handler.svg)](https://coveralls.io/github/weew/app-error-handler)
[![Version](https://img.shields.io/packagist/v/weew/app-error-handler.svg)](https://packagist.org/packages/weew/app-error-handler)
[![Licence](https://img.shields.io/packagist/l/weew/app-error-handler.svg)](https://packagist.org/packages/weew/app-error-handler)

## Table of contents

- [Installation](#installation)
- [Introduction](#introduction)
- [Usage](#usage)

## Installation

`composer require weew/app-error-handler`

## Introduction

This is an integration of the [weew/error-handler](https://github.com/weew/error-handler) library in to the [weew/app](https://github.com/weew/app) framework.

## Usage

To enable this provider simply register it on the kernel.

```php
$app->getKernel()->addProviders([
    ErrorHandlerProvider::class,
]);
```
