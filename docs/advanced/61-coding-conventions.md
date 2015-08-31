# Coding conventions

> **Heads up!** This section is under development.

- DO NOT repeat yourself
- USE PSR-2

## Confiuration

- MUST NOT contain secrects

## Docker

- host-volumes MUST NOT overlap
- all containers SHOULD keep running, eg. data-containers with `tail -f /dev/null`

## Database (MySQL)

- camelCase_id
- MUST USE non-project specific default values
- SHOULD have an idempotent setup (see `BaseAppCommand`)

## PHP

### Classes

- MUST USE English names

### Variables

- camelCase
- $this->table_field;

### Yii 

- MUST add `Tester` classes to the repository
- SHOULD use `Yii::info()` or `Yii::trace()`, NOT `Yii::getLogger->(..., ..., ...)`
- SHOULD NOT use `application.language = null` with `codemix/yii2-localeurls`
- SHOULD NOT use static `::className()` calls in application configuration  

### Giiant (Backend CRUD)

- providers MUST NOT be copied into the project, may can extend a new class
- SHOULD contain `Id` columns


## CSS
- SHOULD use hyphens for CSS classes and ID's i.e. `.my-class` and `#my-id`

## JavaScript

## bash

