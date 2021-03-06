<?php

/**
 * This is the model class for table "submission_reference".
 *
 * The followings are the available columns in table 'submission_reference':
 * @property string $id
 * @property string $submission_id
 * @property string $reference_id
 *
 * The followings are the available model relations:
 * @property Submission $submission
 */
class SubmissionReference extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SubmissionReference the static model class
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
		return 'submission_reference';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('submission_id, reference_id', 'required'),
			array('submission_id, reference_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, submission_id, reference_id', 'safe', 'on'=>'search'),
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
			'reference_id' => 'Reference',
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
		$criteria->compare('reference_id',$this->reference_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}