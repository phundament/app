<?php

namespace app\modules\cms\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\cms\models\Html]].
 *
 * @see \app\modules\cms\models\Html
 */
class HtmlQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\cms\models\Html[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\cms\models\Html|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
