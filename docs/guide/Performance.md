## Performance Tuning

To ensure maximum speed of your web application, check the following settings on your production system:

* set YII_DEBUG to `false`
* disable LESS compiler
* disable YiiDebugToolbar
* configure log routes (eg. file route with alert and error)
* enable caching (eg. APC)
* enable package compression