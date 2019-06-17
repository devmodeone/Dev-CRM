<?php
namespace app\widgets;

use Yii;

/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * Yii::$app->session->setFlash('error', 'This is the message');
 * Yii::$app->session->setFlash('success', 'This is the message');
 * Yii::$app->session->setFlash('info', 'This is the message');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * Yii::$app->session->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 */
class Notify extends \yii\base\Widget
{
    public $notifyTypes = [
        'error'   => 'danger',
        'danger'  => 'danger',
        'success' => 'success',
        'info'    => 'info',
        'warning' => 'warning',
    ];

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $session = Yii::$app->session;
        $flashes = $session->getAllFlashes();
        $view = $this->getView();
        $appendClass = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

        foreach ($flashes as $type => $flash) {
            if (!isset($this->notifyTypes[$type])) {
                continue;
            }

            foreach ((array) $flash as $i => $message) {

                $script = "
                    new PNotify({
                        text: '{$message}',
                        addclass: 'alert alert-styled-right {$appendClass}',
                        type: '{$this->notifyTypes[$type]}'
                    });
                ";

                $view->registerJs($script, $view::POS_READY);
            }

            $session->removeFlash($type);
        }
    }
}
