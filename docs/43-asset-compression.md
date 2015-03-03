Asset compression
-----------------

Phundament bundles the assets in the `:development` Docker container, which comes pre-installed with all required
tools, to make use of Yii 2.0 Framework asset compresssion.

    sh build/assets.sh
    
> Note! Make sure not to use a backlash `\` at the beginning of your asset-bundle name, since it may conflict with
> the `className()` which returns values without a starting backslash