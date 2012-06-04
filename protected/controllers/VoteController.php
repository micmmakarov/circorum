<?php

class VoteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','vote'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Vote;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vote']))
		{
			$model->attributes=$_POST['Vote'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vote']))
		{
			$model->attributes=$_POST['Vote'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Vote');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	
	public function actionVote()
	{
		if(isset($_POST['Vote']))
		{
            $changed = 0;
			//Change 1s to ajax values sent in
			$vote = Vote::model()->findByAttributes(array('submission_id'=>$_POST['submission_id'], 'category_id'=>$_POST['category_id'], 'user_id'=>Yii::app()->user->data()->id));
			if (!is_null($vote)) {
				if ($vote->up == $_POST['up']) { //change 1, compare to up/down from post vars
					return; //you already voted, shame trying to vote twice
				}
				else //else, change the vote
				{
                    $changed = 1;
					$vote->up = $_POST['up']; //change 1, set to value from post
				}
			}
			else	//create a new vote if one doesn't exist, fill it with vars from post
			{
				$vote = new Vote();
				$vote->user_id=Yii::app()->user->data()->id;
				$vote->vote_date=time();
				$vote->up=$_POST['up'];
				$vote->category_id=$_POST['category_id'];
				$vote->submission_id=$_POST['submission_id'];
				$vote->comment_id=1;
			}
			

			$vote->save();
			
			//see if we have an existing vote total
			$votetotal = VoteTotal::model()->findByAttributes(array('submission_id'=>$_POST['submission_id'], 'category_id'=>$_POST['category_id'])); //change 1s to vars from post
			
			if (is_null($votetotal)) {
				$votetotal = new VoteTotal();
				$votetotal->submission_id = $_POST['submission_id'];
				$votetotal->category_id = $_POST['category_id'];
				if ($vote->up) {
					$votetotal->vote_total = 1; //don't change this 1, but remove this comment
				}
				else
				{
					$votetotal->vote_total = -1;
				}
			}
			else
			{
				if ($vote->up) {
					$votetotal->vote_total = $votetotal->vote_total + 1 + $changed;
				}
				else
				{
					$votetotal->vote_total = $votetotal->vote_total - 1 - $changed;
				}
			}
			

			$votetotal->last_update = time();
			$votetotal->save();
			
			echo $votetotal->vote_total;
		} 
			
	}

	
	public function actionList()
	{
		$dataProvider=new CActiveDataProvider('Vote');
		$this->render('list',array(
				'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Vote('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vote']))
			$model->attributes=$_GET['Vote'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Vote::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='vote-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
