<?php

class m131006_014702_p3media_authItems extends CDbMigration
{

    public function up()
    {

        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3media.P3Media.Create",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3media.P3Media.View",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3media.P3Media.Update",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3media.P3Media.Delete",
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
                 "child"  => "P3media.P3Media.Create",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3media.P3Media.View",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3media.P3Media.Update",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3media.P3Media.Delete",
            )
        );

        
        
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3media.P3MediaTranslation.Create",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3media.P3MediaTranslation.View",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3media.P3MediaTranslation.Update",
                 "type"        => "0",
                 "description" => null,
                 "bizrule"     => null,
                 "data"        => "N;",
            )
        );
        $this->insert(
            "AuthItem",
            array(
                 "name"        => "P3media.P3MediaTranslation.Delete",
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
                 "child"  => "P3media.P3MediaTranslation.Create",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3media.P3MediaTranslation.View",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3media.P3MediaTranslation.Update",
            )
        );
        $this->insert(
            "AuthItemChild",
            array(
                 "parent" => "Editor",
                 "child"  => "P3media.P3MediaTranslation.Delete",
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