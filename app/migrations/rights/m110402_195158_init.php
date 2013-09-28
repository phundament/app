<?php

class m110402_195158_init extends CDbMigration {

	public function up() {

		if ($this->dbConnection->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';


// Schema for table 'AuthAssignment'

		$this->createTable("AuthAssignment", array(
			"itemname" => "varchar(64) NOT NULL",
			"userid" => "varchar(64) NOT NULL",
			"bizrule" => "text",
			"data" => "text",
			//"INDEX (itemname)"
			), $options);



// Data for table 'AuthAssignment'
// Schema for table 'AuthItem'

		$this->createTable("AuthItem", array(
			"name" => "varchar(64) NOT NULL",
			"type" => "int(11) NOT NULL",
			"description" => "text",
			"bizrule" => "text",
			"data" => "text",
			"PRIMARY KEY (name)"
			), $options);



// Data for table 'AuthItem'
// Schema for table 'AuthItemChild'

		$this->createTable("AuthItemChild", array(
			"parent" => "varchar(64) NOT NULL",
			"child" => "varchar(64) NOT NULL",
			//"INDEX (parent)"
			), $options);




		$this->createTable("Rights", array(
			"itemname" => "varchar(64) NOT NULL",
			"type" => "int(11) NOT NULL",
			"weight" => "int(11) NOT NULL",
			//"PRIMARY KEY (itemname)"
			), $options);
		
// Foreign Keys for table 'AuthItemChild'

		if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
			$this->addForeignKey('fk_authitem_parent', 'AuthItemChild', 'parent', 'AuthItem', 'name', null, null); // update 'null' for ON DELTE and ON UPDATE
			$this->addForeignKey('fk_authitem_child', 'AuthItemChild', 'child', 'AuthItem', 'name', null, null); // update 'null' for ON DELTE and ON UPDATE
		endif;


		// Foreign Keys for table 'AuthAssignment'

		if (($this->dbConnection->schema instanceof CSqliteSchema) == false):

			$this->addForeignKey('fk_authitem_itemname', 'AuthAssignment', 'itemname', 'AuthItem', 'name', null, null); // update 'null' for ON DELTE and ON UPDATE

		endif;


// Foreign Keys for table 'AuthItem'

		if (($this->dbConnection->schema instanceof CSqliteSchema) == false):

		endif;


// Foreign Keys for table 'Rights'

		if (($this->dbConnection->schema instanceof CSqliteSchema) == false):

			$this->addForeignKey('fk_rights_authitem_itemname', 'Rights', 'itemname', 'AuthItem', 'name', null, null); // update 'null' for ON DELTE and ON UPDATE

		endif;



// Data for table 'AuthItemChild'

		$this->insert("AuthItem", array(
			"name" => "Admin",
			"type" => "2",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "Authenticated",
			"type" => "2",
			"description" => 'All user accounts',
			"bizrule" => 'return !Yii::app()->user->isGuest;',
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "Guest",
			"type" => "2",
			"description" => null,
			"bizrule" => 'return Yii::app()->user->isGuest;',
			"data" => "N;",
		));

		
	}

	public function down() {
		$this->dropTable('AuthAssignment');
		$this->dropTable('AuthItem');
		$this->dropTable('AuthItemChild');
		$this->dropTable('Rights');
	}

	/*
	  // Use safeUp/safeDown to do migration with transaction
	  public function safeUp()
	  {
	  }

	  public function safeDown()
	  {
	  }
	 */
}