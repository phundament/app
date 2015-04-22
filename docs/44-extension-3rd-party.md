

Set constraint to `@dev` before starting code modifications and run 
    
    composer require vendor/package:@dev
     
> If you've already changed code in a dist-package, you can move away the package with the changes.
> `mv package _package`, run the above command and then copy only the contents from the modified folder
> into the package folder. `git status` should now your changes now.