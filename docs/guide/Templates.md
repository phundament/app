## Where are my views?

In a default Yii application views would be in `app/views`. But as Phundament uses two themes for frontend and backend per default, all application views are placed in `app/themes/frontend/views` and `app/themes/backend/views`. Although you can use a folder `app/views`, please note that the theme views take precedence.

### Template Hierarchy

 * main layout (head, body, footer)
   * column layout (static pages with programmatic sidebars, eg. in modules) 
     * views (widget container)
       * widgets (micro-controller logic)
         * editor templates (html blocks)

## Home Page

`app/themes/frontend/views/site/index.php`

## Dynamic Pages

Templates for ready to use with P3Pages, with P3WidgetContainer.

 * `app/themes/frontend/views/p3pages/column1.php`
 * `app/themes/frontend/views/p3pages/column2.php`

## Configuration

`config/main.php`

* `modules => p3pages => params => availableLayouts`
* `modules => p3pages => params => availableViews`

## CSS and JS files

Public files 

`www/themes/frontend`