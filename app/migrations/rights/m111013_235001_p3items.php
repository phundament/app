<?php

class m111013_235001_p3items extends CDbMigration {

	public function up() {


		$this->insert("AuthItem", array(
			"name" => "Editor",
			"type" => "2",
			"description" => "Content Editor (Widgets, Media Files)",
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3admin.Default.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3admin.Module.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3media.Ckeditor.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3media.Default.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3media.File.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3media.Import.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3media.P3Media.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3media.P3MediaMeta.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3widgets.Default.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3widgets.Widget.*",
			"type" => "1",
			"description" => "Frontend Editor",
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3widgets.P3Widget.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3widgets.P3WidgetMeta.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3widgets.P3WidgetTranslation.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3pages.P3Page.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3pages.Default.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3pages.P3PageMeta.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));

		$this->insert("AuthItem", array(
			"name" => "P3pages.P3PageTranslation.*",
			"type" => "1",
			"description" => null,
			"bizrule" => null,
			"data" => "N;",
		));


// Data for table 'AuthItemChild'

		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3media.Ckeditor.*",
		));

		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3media.Default.*",
		));

		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3media.Import.*",
		));

		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3media.P3Media.*",
		));

		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3media.P3MediaMeta.*",
		));

		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3widgets.Default.*",
		));

		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3widgets.Widget.*",
		));
		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3widgets.P3Widget.*",
		));
		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3widgets.P3WidgetMeta.*",
		));
		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3widgets.P3WidgetTranslation.*",
		));

		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3pages.Default.*",
		));

		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3pages.P3Page.*",
		));
		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3pages.P3PageMeta.*",
		));
		$this->insert("AuthItemChild", array(
			"parent" => "Editor",
			"child" => "P3pages.P3PageTranslation.*",
		));

		// assignin admin after editor, otherwise all items created by admin are protected, TODO
		$this->insert("AuthAssignment", array(
			"itemname" => "Editor",
			"userid" => "1",
			"bizrule" => null,
			"data" => "N;",
		));

		// assignin admin after editor, otherwise all items created by admin are protected, TODO
		$this->insert("AuthAssignment", array(
			"itemname" => "Admin",
			"userid" => "1",
			"bizrule" => null,
			"data" => "N;",
		));
	}

	public function down() {
		
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