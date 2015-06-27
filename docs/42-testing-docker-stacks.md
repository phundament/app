Testing stacks
==============

See also [dmstr/yii2-yaml-converter-command](https://github.com/dmstr/yii2-yaml-converter-command).

See `build/stacks-gen` for the final stacks, to create the stack flavour from `docker-compose.yml` and `build/stacks-tpl` run

    make app-build-stacks

### Stack merge rules
    
The process of creating flavours is as follows:

- use `docker-compose.yml` as *base-template*
- look for `*.tpl.yml` files in `build/stacks-tpl`
  - merge every file with base-template and output to `stacks-gen`
    - if there is a folder with the same name, but without `.tpl.yml` suffix, repeat this process with the file generated above as *base-template*

- output is done in flat files
- files are merged recursive as PHP arrays
- special rule: `.service: CLEAN` or `.attribute: CLEAN` removes the attribute before merging the arrays
 
### Known limitations

You can not unset values in an attribute list/array/hashmap selectively.