<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }
    
    public function actionEvent(){
        $person = new Person();
        $person->on(Person::EVENT_001, [$person, 'person_SAY_HELLO'], 'SHOU001');
        $person->on(Person::EVENT_001, [$person, 'person_SAY_HELLO'], 'SHOU002');
        $person->on(Person::EVENT_001, [$person, 'person_SAY_HELLO'], 'SHOU003');
        
        $person->trigger(Person::EVENT_001);
        
        echo PHP_EOL;
    }
    
    public function actionBehavior() {

        $behavior = new MyBehavior();

        $person = new Person();
        $person->attachBehavior('sayHello', $behavior);

        $person->sayHello();
    }
    
}


class MyBehavior extends \yii\base\Behavior{
    public $message = 'Hello, World';

    public function __construct() {
        echo __METHOD__ . PHP_EOL;
        parent::__construct();
    }
    
    public function init(){
        echo __METHOD__ . PHP_EOL;
    }


    public function sayHello() {
        echo $this->message . PHP_EOL;
        echo $this->owner->name . PHP_EOL;
    }
    
    public function events() {
        return [
            '001' => 'fun001',
            '002' => 'fun002',
        ];
    }
    
    function fun001($event){
        echo 'fun001' . $event->name;
    }
    
    function fun002($event){
        echo 'fun002' . $event->name;
    }
    
}

class Person extends \yii\base\Component {

    const EVENT_001 = "001";
    const EVENT_002 = "002";

    public $name = 'name';
    public $sex;
    public $age;
    
    function person_say_hello($event) {
        echo print_r($event, true) . " person_say_hello()" . PHP_EOL;
    }

}

