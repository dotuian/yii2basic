<?php

namespace app\components;

use Yii;

/**
 * @inheritdoc
 *
 * @property \app\models\User|\yii\web\IdentityInterface|null 
 * $identity The identity object associated with the currently logged-in user. 
 * null is returned if the user is not logged in (not authenticated).
 */
class User extends \yii\web\User
{
}

?>
