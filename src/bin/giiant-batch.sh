#!/usr/bin/env bash

# Create directories required by Giiant code-generator

mkdir -p /app/src/extensions/${MODULE_ID}/controllers
mkdir -p /app/src/extensions/${MODULE_ID}/models/search

# Note: use --modelDb=db_${MODULE_ID} for module_specific db connections

yii giiant-batch \
      --interactive=0 \
      --overwrite=1 \
      --tablePrefix=app_ \
      --modelDb=db \
      --modelNamespace=app\\modules\\crud\\models \
      --modelQueryNamespace=app\\modules\\crud\\models\\query \
      --crudAccessFilter=1 \
      --crudControllerNamespace=app\\modules\\crud\\controllers \
      --crudSearchModelNamespace=app\\modules\\crud\\models\\search \
      --crudViewPath=@app/modules/crud/views \
      --crudPathPrefix= \
      --tables=app_html,app_less