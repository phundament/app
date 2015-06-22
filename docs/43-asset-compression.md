Asset compression
-----------------

> **Heads up!** This section uses [doma](https://github.com/schmunk42/doma).

Phundament bundles the assets in the `:development` Docker container, which comes pre-installed with all required
tools, to make use of Yii 2.0 Framework asset compresssion.

    make app-build-assets
    
> Note! Make sure not to use a backlash `\` at the beginning of your asset-bundle name, since it may conflict with
> the `className()` which returns values without a starting backslash