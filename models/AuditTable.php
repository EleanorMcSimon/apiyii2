<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "audit_table".
 *
 * The followings are the available columns in table 'audit_table':
 * @property integer $id
 * @property string $description
 * @property string $action
 * @property string $model
 * @property integer $idModel
 * @property string $field
 * @property integer $userid
 * @property string $time_stamp
 * @property string $old_value
 * @property string $new_value
 * 
 */




 class AuditTable extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AuditTable the static model class
	 */
	public static $AuditTable =[
		 array(
	'id'=> AuditTable->ID,
	'description' => AuditTable->Description,
		)
	];
	public static function getDb()
    {
        // use the "db2" application component
        return \Yii::$app->db2;  
    }

    public function tableName()
	{
		return 'audit_table';
	}
    public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Description',
			'action' => 'Action',
			'model' => 'Model',
			'idModel' => 'Id Model',
			'field' => 'Field',
			'userid' => 'Userid',
			'time_stamp' => 'Time Stamp',
			'old_value' => 'Old Value',
			'new_value' => 'New Value',
		);
	}
    public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, action, model, idModel, userid, time_stamp', 'required'),
			array('idModel, userid', 'numerical', 'integerOnly'=>true),
			array('description, old_value, new_value', 'length', 'max'=>255),
			array('action', 'length', 'max'=>20),
			array('model, field', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, action, model, idModel, field, userid, time_stamp, old_value, new_value', 'safe', 'on'=>'search'),
		);
	}
    public function search()
	{
        $id = AuditTable::findBySql('SELECT AuditTable, id FROM api2')->all();
      $description = AuditTable::findBySql('SELECT AuditTable, description FROM api2')->all();
      $action = AuditTable::findBySql('SELECT AuditTable, action FROM api2')->all();
      $model = AuditTable::findBySql('SELECT AuditTable, model FROM api2')->all();
      $idModel = AuditTable::findBySql('SELECT AuditTable, idModel FROM api2')->all();
      $field = AuditTable::findBySql('SELECT AuditTable, field FROM api2')->all();
      $time_stamp = AuditTable::findBySql('SELECT AuditTable, time_stamp FROM api2')->all();
      $old_value = AuditTable::findBySql('SELECT AuditTable, old_value FROM api2')->all();
      $new_value = AuditTable::findBySql('SELECT AuditTable, new_value FROM api2')->all();
    }
}