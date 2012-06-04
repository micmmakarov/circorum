<?php

/**
 * This is the model class for table "vote_total".
 *
 * The followings are the available columns in table 'vote_total':
 * @property string $id
 * @property string $submission_id
 * @property string $category_id
 * @property integer $vote_total
 * @property integer $last_update
 */
class VoteTotal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VoteTotal the static model class
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
		return 'vote_total';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('submission_id, category_id', 'required'),
			array('vote_total, last_update', 'numerical', 'integerOnly'=>true),
			array('submission_id, category_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, submission_id, category_id, vote_total, last_update', 'safe', 'on'=>'search'),
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
			'submission_id' => 'Submission',
			'category_id' => 'Category',
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
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('vote_total',$this->vote_total);
		$criteria->compare('last_update',$this->last_update);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}