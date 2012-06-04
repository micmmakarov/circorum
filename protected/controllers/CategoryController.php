<?php

class CategoryController extends Controller
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
				'actions'=>array('view','page'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index'),
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
	public function actionView($name = '')
	{
        $categories = null;

        //Find the requested category by name
		if (strlen($name) > 0) {
			$category = Category::model()->with('parent','children')->find(array('condition'=>'`t`.`name` = \'' . str_replace("_", " ", $name) . '\''));
			if (!is_null($category)) {
                //This will get the subcategories if the category that was found is a parent,
                //otherwise it returns the current category id in an array
                $categories = $category->getSubcategoryIds();
			}
		}

        //Get id of current user so we can pull in their votes
        if (Yii::app()->user->isGuest) {
            $user_id = -1;
        }
        else {
            $user_id = Yii::app()->user->data()->id;
        }

        //If there were no categories requested and the user is logged in
        //use the categories that are subscribed to
        if (is_null($categories) && $user_id != -1) {
                //Change this to get the necessary categories
            $categories = array(30,31,32);
        }

        //Change the sort type passed to this based on the user's last setting
        $submissions = Submission::getSortedListPage(Submission::TopSort, $categories, $user_id, 0, 25);


        $this->render('sort', array(
                'submissionlist'=>$this->renderPartial('list',array(
                    'submissions'=>$submissions,
                    'categories'=>$categories
                ),
                true)
        ));
	}

    //Accessed via Ajax for additional pages, or first page of a new sort
    public function actionPage() {

        if (Yii::app()->user->isGuest) {
            $user_id = -1;
        }
        else {
            $user_id = Yii::app()->user->data()->id;
        }

        //Need to get categories somehow
        $categories = null;

        $pagenum = 0;
        if (isset($_POST['pagenum'])) {
            $pagenum = $_POST['pagenum'];
        }

        $sort_type = 0;
        if (isset($_POST['sorttype'])) {
            $sort_type = $_POST['sorttype'];
        }

        $submissions = Submission::getSortedListPage($sort_type, $categories, $user_id, $pagenum, 25);
        $this->renderPartial('list',array(
            'submissions'=>$submissions,
            'categories'=>$categories
        ));
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Category;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
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

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
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
		$dataProvider=new CActiveDataProvider('Category');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Category('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Category']))
			$model->attributes=$_GET['Category'];

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
		$model=Category::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
}
