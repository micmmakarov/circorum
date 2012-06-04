<?php

/**
 * This is the model class for table "vote".
 *
 * The followings are the available columns in table 'vote':
 * @property string $id
 * @property string $user_id
 * @property string $vote_date
 * @property integer $up
 * @property string $submission_id
 * @property string $category_id
 * @property string $comment_id
 */
class Vote extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Vote the static model class
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
		return 'vote';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, vote_date, up, category_id', 'required'),
			array('up', 'numerical', 'integerOnly'=>true),
			array('user_id, vote_date, submission_id, category_id, comment_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, vote_date, up, submission_id, category_id, comment_id', 'safe', 'on'=>'search'),
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
				'user' => array(self::BELONGS_TO, 'YumUser', 'user_id'),
				'submission' => array(self::BELONGS_TO, 'Submission', 'submission_id'),
				'comment' => array(self::BELONGS_TO, 'SubmissionComment', 'comment_id'),
				'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'vote_date' => 'Vote Date',
			'up' => 'Up',
			'submission_id' => 'Submission',
			'category_id' => 'Category',
			'comment_id' => 'Comment',
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('vote_date',$this->vote_date,true);
		$criteria->compare('up',$this->up);
		$criteria->compare('submission_id',$this->submission_id,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('comment_id',$this->comment_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}