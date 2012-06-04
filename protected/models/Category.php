<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property string $id
 * @property string $name
 * @property string $parent_id
 * @property string $description
 *
 * The followings are the available model relations:
 * @property CategorySubscription[] $categorySubscriptions
 * @property SubmissionCategory[] $submissionCategories
 * @property Vote[] $votes
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}
	
	public function linkName() {
		return '/c/' . str_replace(" ", "_", $this->name);
	}

    public function getSubcategoryIds() {
        $subcategories = array();
        if (is_null($this->parent_id)) {
            foreach($this->children as $child) {
                array_push($subcategories, $child->id);
            }
        }
        else
        {
            array_push($subcategories, $this->id);
        }
        return $subcategories;
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>100),
			array('parent_id', 'length', 'max'=>10),
			array('description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('name, description', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'categorySubscriptions' => array(self::HAS_MANY, 'CategorySubscription', 'category_id'),
			'submissions' => array(self::MANY_MANY, 'Submission', 'submission_category(category_id,submission_id)'),
			'votes' => array(self::HAS_MANY, 'Vote', 'category_id'),
			'parent' => array(self::BELONGS_TO, 'Category', 'parent_id'),
			'children' => array(self::HAS_MANY, 'Category', 'parent_id'),
			'votetotals' => array(self::HAS_MANY, 'VoteTotal', 'category_id'),
			'subscribedusers' => array(self::MANY_MANY, 'YumUser','category_subscription(category_id,user_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'parent_id' => 'Parent',
			'description' => 'Description',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}