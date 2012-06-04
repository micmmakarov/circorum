<?php

/**
 * This is the model class for table "submission".
 *
 * The followings are the available columns in table 'submission':
 * @property string $id
 * @property string $title
 * @property string $user_id
 * @property string $link
 * @property string $authors
 * @property string $submission_date
 * @property string $publication_date
 * @property string $abstract
 * @property string $body
 * @property string $document
 * @property string $doi
 * @property string $journal
 * @property integer $issue_number
 * @property string $pages
 *
 */
class Submission extends CActiveRecord
{
	const TopSort = 0;
    const RecentSort = 1;
    const HotSort = 2;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Submission the static model class
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
		return 'submission';
	}
	
	public function linkName() {
		$stripped = preg_replace('/\s+/', ' ', preg_replace("/\W/", " ", $this->title));
		if (strlen($stripped) > 200) {
			$stripped = substr($stripped, 0, 200);
		}
		$lastspace = strrpos($stripped, " ");
		if(!is_null($this->currentCategory())) {
			$linkprefix = $this->currentCategory()->linkName();
		} else {
			$linkprefix = '/c/category';
		}
		return $linkprefix . '/' . $this->id . '/' . str_replace(" ", "_", substr($stripped, 0, $lastspace));
	}

    public function currentCategory() {
        if (!is_null($this->categories)) {
            return $this->categories[0];
        }
        else {
            return null;
        }
    }

    public function currentVoteTotal() {
        if (!is_null($this->votetotal)) {
            return $this->votetotal[0];
        }
        else {
            return null;
        }
    }

    public function currentUserVote() {
        if (!is_null($this->uservote) && count($this->uservote) > 0) {
            return $this->uservote[0]->up;
        }
        return -1;
    }

    public static function getSortedListPage($sort_type=2, $category_ids=null, $user_id=-1, $page_num=0, $items_per_page=25) {

        //Setup condition for category IDs
        if (!is_null($category_ids)) {
            $cat_condition = '`categories`.`id` IN (';
            foreach($category_ids as $category_id) {
                $cat_condition = $cat_condition . $category_id . ',';
            }
            $criteria['condition'] = substr($cat_condition, 0, -1) . ')';
        }

        //Setup condition for sorting
        switch($sort_type) {
            case Submission::TopSort:
                $criteria['order'] = '`votetotal`.`vote_total` DESC';
                break;
            case Submission::RecentSort:
                $criteria['order'] = '`t`.`submission_date` DESC';
                break;
            default:
                $criteria['order'] = '`votetotal`.`hot_index` DESC';
                break;
        }

        //Setup condition for page
        $criteria['limit'] = $items_per_page;
        $criteria['offset'] = $page_num * $items_per_page;
        $criteria['together'] = true;

        return Submission::model()->with(
            array(
                'categories',
                'user',
                'votetotal'=>array(
                    'on'=>'`votetotal`.`category_id` = `categories`.`id`'
                ),
                'uservote'=>array(
                    'on'=>'`uservote`.`user_id` = ' . $user_id
                )
            ))->findAll($criteria);
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, user_id, submission_date, publication_date, abstract, doi', 'required'),
			array('issue_number', 'numerical', 'integerOnly'=>true),
			array('title, link, authors', 'length', 'max'=>255),
			array('user_id, submission_date, publication_date', 'length', 'max'=>10),
			array('doi, pages', 'length', 'max'=>45),
			array('journal', 'length', 'max'=>100),
			array('body, document', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, user_id, link, authors, submission_date, publication_date, abstract, body, document, doi, journal, issue_number, pages', 'safe', 'on'=>'search'),
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
			'categories' => array(self::MANY_MANY, 'Category', 'submission_category(submission_id,category_id)'),
			'comments' => array(self::HAS_MANY, 'SubmissionComment', 'submission_id'),
			'references' => array(self::HAS_MANY, 'SubmissionReference', 'submission_id'),
			'votes' => array(self::HAS_MANY, 'Vote', 'submission_id'),
			'user' => array(self::BELONGS_TO, 'YumUser', 'user_id'),
			'votetotal' => array(self::HAS_MANY, 'VoteTotal', 'submission_id'),
            'uservote' => array(self::HAS_MANY, 'Vote', 'submission_id',
                'joinType'=>'LEFT JOIN',
                'on'=>'`uservote`.`category_id` = `categories`.`id`'
            )
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'user_id' => 'User',
			'link' => 'Link',
			'authors' => 'Authors',
			'submission_date' => 'Submission Date',
			'publication_date' => 'Publication Date',
			'abstract' => 'Abstract',
			'body' => 'Body',
			'document' => 'Document',
			'doi' => 'Doi',
			'journal' => 'Journal',
			'issue_number' => 'Issue Number',
			'pages' => 'Pages',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('authors',$this->authors,true);
		$criteria->compare('submission_date',$this->submission_date,true);
		$criteria->compare('publication_date',$this->publication_date,true);
		$criteria->compare('abstract',$this->abstract,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('document',$this->document,true);
		$criteria->compare('doi',$this->doi,true);
		$criteria->compare('journal',$this->journal,true);
		$criteria->compare('issue_number',$this->issue_number);
		$criteria->compare('pages',$this->pages,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}