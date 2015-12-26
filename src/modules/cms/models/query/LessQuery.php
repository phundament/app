<?php

namespace app\modules\cms\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\cms\models\Less]].
 *
 * @see \app\modules\cms\models\Less
 */
class LessQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\cms\models\Less[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\cms\models\Less|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
