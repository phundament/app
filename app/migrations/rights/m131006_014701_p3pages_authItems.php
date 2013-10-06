<?php

class m131006_014701_p3pages_authItems extends CDbMigration
{

    public function up()
    {


        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3pages.P3Page.Create",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3pages.P3Page.View",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3pages.P3Page.Update",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3pages.P3Page.Delete",
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
                 "child"  => "P3pages.P3Page.Create",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3pages.P3Page.View",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3pages.P3Page.Update",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3pages.P3Page.Delete",
            )
        );

        
        
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3pages.P3PageTranslation.Create",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3pages.P3PageTranslation.View",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3pages.P3PageTranslation.Update",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3pages.P3PageTranslation.Delete",
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
                 "child"  => "P3pages.P3PageTranslation.Create",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3pages.P3PageTranslation.View",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3pages.P3PageTranslation.Update",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3pages.P3PageTranslation.Delete",
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