<?php
namespace noIT\seo\components;

use yii\base\Component;
use yii\web\Application;
use yii\web\View;

class SeoComponent extends Component {
	/**
	 * @var $model \common\models\SeoByUrl
	 */
	protected $model;

	public function init() {
		parent::init();
		\Yii::$app->on(Application::EVENT_BEFORE_REQUEST, [$this, 'renderMetaTags']);
		\Yii::$app->getView()->on(View::EVENT_BEGIN_PAGE, [$this, 'registerMetaTags']);
	}

	/**
	 * Render meta tags
	 */
	public function renderMetaTags()
	{
		$currentRoute = $this->getCurrentRoute();

		if ( ($model = \common\models\SeoByUrl::find()->where(['url' => $currentRoute])->one()) ) {
			$this->model = $model;
		}

		if (null !== $this->model) {
			if ($this->model->h1) {
				$this->registerMetaTag( 'h1', $this->model->h1 );
			}
			if ($this->model->seo_text) {
				$this->registerMetaTag( 'seo_text', $this->model->seo_text );
			}
			if ($this->model->title) {
				$this->registerMetaTag( 'title', $this->model->title );
			}
			if ($this->model->description) {
				$this->registerMetaTag( 'description', $this->model->description );
			}
		}
	}

	/**
	 * Register meta tag in view
	 */
	public function registerMetaTags()
	{

	}

	/**
	 * Get current route
	 *
	 * @return string
	 */
	protected function getCurrentRoute()
	{
		return \Yii::$app->getRequest()->getPathInfo();
	}

	/**
	 * @param $name
	 * @param $content
	 */
	protected function registerMetaTag($name, $content)
	{
		$view = \Yii::$app->getView();
		switch ($name) {
			case 'title':
				$view->title = $content;
				break;
			case 'h1':
				$view->params['h1'] = $content;
				break;
			case 'seo_text':
				$view->params['seo_text'] = $content;
				break;
			default:
				$view->registerMetaTag(['name' => $name, 'content' => $content]);
		}
	}
}