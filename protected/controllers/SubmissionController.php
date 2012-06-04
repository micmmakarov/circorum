<?php

class SubmissionController extends Controller
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
				'actions'=>array('ajaxVote', 'index','view','list','listcategory','genvotes','show', 'recentsort', 'topsort', 'hotsort', 'CategoryList', 'genvotetotals'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
		$model=new Submission;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Submission']))
		{
			$model->attributes=$_POST['Submission'];
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

		if(isset($_POST['Submission']))
		{
			$model->attributes=$_POST['Submission'];
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
		$dataProvider=new CActiveDataProvider('Submission');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionList()
	{
		$dataProvider=new CActiveDataProvider('Submission');

        $categories = Category::model()->with('children')->findAll();
        $dataProvider2 = new CArrayDataProvider($categories);
        $a="Hello!";

        $this->render('list',array(
				'dataProvider'=>$dataProvider,$a,
        ));

	}
	
	public function actionListCategory($id,$limit=10) {
		
		$submissions = Submission::model()->with(array(
				'categories'=>array(
						'on'=>'categories.id='.$id,
						'together'=>true,
						'joinType'=>'RIGHT JOIN'
				),
				'user'=>array(
						'on'=>'t.user_id=user.id',
						'together'=>true,
						'joinType'=>'INNER JOIN',
				)))->findAll(array(
						'limit'=>$limit
				));
		
		$dataProvider = new CArrayDataProvider($submissions);
		
		$this->render('list',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionGenVotes() {
		
		$submissions = Submission::model()->findAll();
		
		foreach($submissions as $submission) {
			for($i = 8; $i <= 31; $i++) {
				$user_id = $i;
				$vote_date = 1324280126;
				$up = rand(0,1);
				$submission_id = $submission->id;
				$numcategories = count($submission->categories);
				$category_id = $submission->categories[rand(0,$numcategories - 1)]->id;
				echo "INSERT INTO main.vote (user_id, vote_date, up, submission_id, category_id) VALUES (" . $user_id . "," . $vote_date .",".$up.",".$submission_id.",".$category_id.");<br \>";
			}
		}
	}
	
	public function actionGenVoteTotals() {
		set_time_limit(100000);
		$submissions = Submission::model()->with('categories')->findAll();
		foreach ($submissions as $submission)
		{
			foreach ($submission->categories as $category)
			{
				$votetotal = VoteTotal::model()->findAllByAttributes(array('submission_id'=>$submission->id, 'category_id'=>$category->id));
				echo 'Category '.$category->id.' Submission '.$submission->id.' VoteTotal '.$votetotal.'<br \>';
				if ($votetotal == null)
				{
					$votetotal = new VoteTotal();
					$votetotal->category_id = $category->id;
					$votetotal->submission_id = $submission->id;
					
					$numVotes = 0;
					$votes = $submission->votes;
					foreach ($votes as $vote)
					{
						if ($vote->category_id == $votetotal->category_id)
						{
							$numVotes += ($vote->up) ? 1 : -1;
						}
					}
					$votetotal->vote_total = $numVotes;
					$votetotal->last_update = time();
					$votetotal->save();
				}
			}
		}
	}

    public function ajaxVote($submission_id, $category_id) {

    }

	public function echoSubComments($indent, $comment) {
	
		for($i = 0; $i < $indent; $i++) {
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
	
		echo "comment: " . $comment->body . " by " . $comment->user->username . "<br />";
	
		$indent++;
		if (!is_null($comment->children)) {
			foreach($comment->children as $childcomment) {
				$this->echoSubComments($indent, $childcomment);
			}
		}
	}
	
	public function actionShow($id) {
		
		$submission = Submission::model()->with('user','comments','categories')->findByPk($id);
		
		if (is_null($submission)) {
			echo "No Submission for you, boy!";
			return;
		}
		
		echo "Submission Title: " . $submission->title . "<br />";
		echo "Submitted by: " . $submission->user->username. "<br />";
		echo "Categories:<br /><ul>";
		foreach($submission->categories as $category) {
			echo "<li>".$category->name."</li>";
		}

		if (is_null($submission->comments)) {
			echo "No Comments for you!";
			return;
		}
		echo "<hr>";
		echo "Comments:<br />";
		foreach($submission->comments as $comment) {
			$this->echoSubComments(0, $comment);
		}
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Submission('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Submission']))
			$model->attributes=$_GET['Submission'];

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
		$model=Submission::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='submission-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionCategoryList()
    {
        $categories = array();
        $categories = Category::model()->with('parent','children','submissions')->findAll();
        foreach($categories as $categoy) {
        }

        $this->render('categories',array(
            'categories'=>$categories,
        ));

    }

}
?>
