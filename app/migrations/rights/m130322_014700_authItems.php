<?php

class m130322_014700_authItems extends CDbMigration
{

    public function up()
    {


        $this->insert("AuthItem", array(
                                       "name"        => "P3admin.Default.Index",
                                       "type"        => "0",
                                       "description" => null,
                                       "bizrule"     => null,
                                       "data"        => "N;",
                                  ));

        $this->insert("AuthItem", array(
                                       "name"        => "P3admin.Default.Settings",
                                       "type"        => "0",
                                       "description" => null,
                                       "bizrule"     => null,
                                       "data"        => "N;",
                                  ));


        // Data for table 'AuthItemChild'
        $this->insert("AuthItemChild", array(
                                            "parent" => "Editor",
                                            "child"  => "P3admin.Default.Index",
                                       ));

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