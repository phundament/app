<?php

class m131006_014700_p3widgets_authItems extends CDbMigration
{

    public function up()
    {


        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3widgets.P3Widget.Create",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3widgets.P3Widget.View",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3widgets.P3Widget.Update",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3widgets.P3Widget.Delete",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );


        // Data for table 'AuthItemChild'
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3widgets.P3Widget.Create",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3widgets.P3Widget.View",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3widgets.P3Widget.Update",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3widgets.P3Widget.Delete",
            )
        );

        
        
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3widgets.P3WidgetTranslation.Create",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3widgets.P3WidgetTranslation.View",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3widgets.P3WidgetTranslation.Update",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3widgets.P3WidgetTranslation.Delete",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );


        // Data for table 'AuthItemChild'
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3widgets.P3WidgetTranslation.Create",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3widgets.P3WidgetTranslation.View",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3widgets.P3WidgetTranslation.Update",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3widgets.P3WidgetTranslation.Delete",
            )
        );
        
    }

    public function down()
    {

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