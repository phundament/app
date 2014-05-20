With Yii's code generator tool gii you can easily create new CRUDs. Phundament App inlcudes gii-template-collection which provides enhanced code templates for Models and CRUDs, called FullModel and FullCRUD.

Before starting with the creation of the admin backend, you should have a look at the excellent article from the Yii Framework Wiki about [guidelines for good schema design](http://www.yiiframework.com/wiki/227/guidelines-for-good-schema-design/).

In order to work smoothly with gii-template-collection we advice about the following points:

* make sure that your MySQL tables are InnoDB
* table should have no composite primary keys
* do not change auto-generated controller names


## Open gii


[http://phundament.local/index.php?r=gii](http://phundament.local/index.php?r=gii)

> Note: Gii's default configuration only allows conncetions from localhost.*

1. Login with password: p3
2. Use FullModel template
3. Use FullCrud template
  * Choose `slim` Template

> Note: CRUD grids omit TEXT columns;*

### Column mappings (Field provider)

Type                    | Widget
------------------------|------------------------------
DATE                    | JuiDatepicker
name contains 'html'    | Ckeditor
ENUM                    | Dropdown
SELECT                  | jQuery Chosen plugin

### MANY_TO_MANY tables

Use composite primary keys, you don't need a model for the MANY_MANY table.

```
    $this->createTable('article_has_subject',
                       array(
                            'article_id' => 'int',
                            'subject_id' => 'int',
                            'PRIMARY KEY (`article_id`, `subject_id`)',
                       ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
```
*Sample Code for CDbMigration*


***


## Enable the gii-template-collection

To make the FullCrud and FullModel available you have to register the templates in gii:

`config/main.php`

    'modules' => array(
        'gii' => array(
            'generatorPaths' => array(
                'vendor.phundament.gii-template-collection', // gtc generators
            ),
        )
    )