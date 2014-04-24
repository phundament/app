## Create an application module

It's a good practice, to modularize classes which belong together. As an example we'll create a *crud* module, which will hold the controllers and views of your database admin backend.

Use `yiic` to create the module skeleton:

    ./yiic shell www/index.php

    >> module crud

    >> exit

Register module in `config/main.php`

    'modules' => array(
        'crud',
        [...]
    )

Your module should now be available in `modules/`   
    
### Next step…

Continue to [[CRUD]]