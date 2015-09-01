#!/usr/bin/env bash

# Create directories required by Giiant code-generator

mkdir -p /app/src/extensions/${MODULE_ID}/controllers
mkdir -p /app/src/extensions/${MODULE_ID}/models/search

# Note: use --modelDb=db_${MODULE_ID} for module_specific db connections

./yii giiant-batch \
    --interactive=0 \
    --overwrite=1 \
    --enableI18N=1 \
    --messageCategory=app \
    --modelNamespace=ext\\${MODULE_ID}\\models \
    --modelBaseClass=yii\\db\\ActiveRecord \
    --modelBaseTraits=\\ext\\${MODULE_ID}\\traits\\ActiveRecordDbConnectionTrait \
    --crudControllerNamespace=ext\\${MODULE_ID}\\controllers \
    --crudSearchModelNamespace=ext\\${MODULE_ID}\\models\\search \
    --crudViewPath=@ext/${MODULE_ID}/views \
    --crudPathPrefix= \
    --crudProviders=schmunk42\\giiant\\generators\\crud\\providers\\DateTimeProvider
