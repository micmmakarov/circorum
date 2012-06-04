<?php

/**
 * This is the model class for table "submission_comment".
 *
 * The followings are the available columns in table 'submission_comment':
 * @property string $id
 * @property string $submission_id
 * @property string $user_id
 * @property string $body
 * @property string $comment_date
 * @property integer $editted
 * @property string $parentcomment_id
 *
 * The followings are the available model relations:
 * @property Submission $submission
 */
class SubmissionComment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SubmissionComment the static model class
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
		return 'submission_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, comment_date', 'required'),
			array('editted', 'numerical', 'integerOnly'=>true),
			array('submission_id, user_id, comment_date, parentcomment_id, vote_total, last_update', 'length', 'max'=>10),
			array('body', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, submission_id, user_id, body, comment_date, editted, parentcomment_id', 'safe', 'on'=>'search'),
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
			'submission' => array(self::BELONGS_TO, 'Submission', 'submission_id'),
			'parent' => array(self::BELONGS_TO, 'SubmissionComment', 'parentcomment_id'),
			'children' => array(self::HAS_MANY, 'SubmissionComment', 'parentcomment_id'),
			'user' => array(self::BELONGS_TO, 'YumUser', 'user_id'),
			'votes' => array(self::HAS_MANY, 'Vote', 'comment_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'submission_id' => 'Submission',
			'user_id' => 'User',
			'body' => 'Body',
			'comment_date' => 'Comment Date',
			'editted' => 'Editted',
			'parentcomment_id' => 'Parentcomment',
			'vote_total' => 'Vote Total',
			'last_update' => 'Last Update',
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
		$criteria->compare('submission_id',$this->submission_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('comment_date',$this->comment_date,true);
		$criteria->compare('editted',$this->editted);
		$criteria->compare('parentcomment_id',$this->parentcomment_id,true);
		$criteria->compare('vote_total',$this->vote_total, true);
		$criteria->compare('last_update',$this->last_update, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}