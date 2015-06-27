#!/usr/bin/env bash
./yii giiant-batch \
    --interactive=0 \
    --overwrite=1 \
    --enableI18N=1 \
    --messageCategory=app \
    --modelBaseClass=app\\modules\\sakila\\base\\SakilaActiveRecord \
    --modelNamespace=app\\modules\\sakila\\models \
    --crudControllerNamespace=app\\modules\\sakila\\controllers \
    --crudSearchModelNamespace=app\\modules\\sakila\\models\\search \
    --crudViewPath=@app/modules/sakila/views \
    --crudPathPrefix= \
    --crudProviders=schmunk42\\giiant\\crud\\providers\\DateTimeProvider \
    --tables=page
