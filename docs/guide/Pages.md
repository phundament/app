## Structure

In general a page consists of three containers: top, main and footer. You can place widgets in the top and main container.

### Edit footer

Unlike the main and top container the footer is static. Edit it in `app/themes/frontend/views/layouts/main.php`

## Static Pages

You can include static pages in Phundament. Go to Pages, click the template button and switch to JSON text input. Paste the string below there.

`{"route":"/site/page","params":{"view":"about"}}` for `/about.php`

The php files you want to include have to be in `app/themes/frontend/views/site/pages/`. about.php already exists in this directory to demonstrate.

There's a standard contact site also. Do this to get it:

`{"route":"/site/contact"}`

> Note: Always use the full route, eg. **not only `/site`**, so the active page can be detected.

If you want to use anchors, see below: 

`{"route":"/site/index","params":{"#":""}}` or `{"route":"/site/index","params":{"#test":""}}`

For more information see Yiis documentation of [createUrl](http://www.yiiframework.com/doc/api/1.1/CController#createUrl-detail).

### Page Forwarding

To forward to another internal page call the `p3pages` controller:

`{"route":"/p3pages/default/page","params":{"pageId":"2"}}`

For custom files or external URL, you can use an `url` key to specify it:

`{"url":"/my-custom.html"}`

`{"url":"http://example.com"}`

## Internationalization

You can add translations of pages and widgets to provide your website in different languages. In the top menu there is a dropdown menu to change the language.

### Add languages to config

To add languages to your site you have to add them in `config/main.php`.

`'langHandler' => array(
            'class' => 'vendor.phundament.p3extensions.components.P3LangHandler',
            'languages' => array('en', 'de')
        )`

To add them in the dropdown menu at the top add it also in `app/themes/frontend/views/layouts/_menu.php`.

`array('label' => 'English',
      'url'   => array_merge(array(''), $_GET, array('lang' => 'en')))`

> Note: If a page is not available in the requested language you see * after the pages name in the top menu.

### Translate Pages and Widgets

When you create a widget you have to add at least one translation.

_TODO_