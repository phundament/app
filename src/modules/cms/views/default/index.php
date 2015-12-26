
<?php
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Inflector;

/*
 * @var yii\web\View $this
 */
$controllers = \dmstr\helpers\Metadata::getModuleControllers($this->context->module->id);
$favourites  = [];

$patterns = [
    '^default$'     => ['color' => 'gray', 'icon' => FA::_CUBE],
    '^.*$'          => ['color' => 'blue', 'icon' => FA::_CUBE],
];

foreach ($patterns AS $pattern => $options) {
    foreach ($controllers AS $c => $item) {
        $controllers[$c]['label'] = $item['name'];
        if (preg_match("/$pattern/", $item['name'])) {
            $favourites[$c]          = $item;
            $favourites[$c]['head']  = $item['name'];
            $favourites[$c]['label'] = 'Controller';
            $favourites[$c]['color'] = $options['color'];
            $favourites[$c]['icon']  = isset($options['icon']) ? $options['icon'] : null;
            unset($controllers[$c]);
        }
    }
}
?>

<?= $this->render(
    '@vendor/dmstr/yii2-adminlte-asset/example-views/phundament/app/default/_controllers.php',
    [
        'controllers'    => $controllers,
        'favourites'     => $favourites,
        'modelNamespace' => 'app\models\\',
    ]
) ?>


