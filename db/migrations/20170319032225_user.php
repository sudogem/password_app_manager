<?php

use Phinx\Migration\AbstractMigration;

class User extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
      // create the table
      $table = $this->table('users');
      $table->addColumn('tmpid', 'integer')
            ->addColumn('username', 'string', array('limit' => 25, 'null' => false))
            ->addColumn('password', 'string', array('limit' => 34, 'null' => false))
            ->addColumn('clearpassword', 'string', array('limit' => 34, 'null' => true))
            ->addColumn('firstname', 'string', array('limit' => 50, 'null' => false, 'default' => ''))
            ->addColumn('lastname', 'string', array('limit' => 50, 'null' => false, 'default' => ''))
            ->addColumn('email', 'string', array('limit' => 100, 'null' => true))
            ->addColumn('skypeid', 'string', array('limit' => 50, 'null' => false, 'default' => ''))
            ->addColumn('role_id', 'integer', array('limit' => 11, 'null' => false, 'default' => 1))
            ->addColumn('position', 'string', array('limit' => 50, 'null' => false, 'default' => ''))
            ->addColumn('pwlength', 'string', array('limit' => 50, 'null' => false, 'default' => 12))
            ->addColumn('banned', 'integer', array('null' => false, 'default' => 0, 'limit' => 1))
            ->addColumn('ban_reason', 'string', array('limit' => 255, 'null' => true))
            ->addColumn('newpass', 'string', array('limit' => 34, 'null' => true))
            ->addColumn('newpass_key', 'string', array('limit' => 32, 'null' => true))
            ->addColumn('newpass_time', 'datetime', array('null' => true))
            ->addColumn('last_ip', 'string', array('limit' => 40, 'null' => true))
            ->addColumn('last_login', 'datetime', array('null' => true))
            ->addColumn('created', 'datetime', array('null' => true))
            ->addColumn('modified', 'timestamp', array('null' => false, 'default' => 'CURRENT_TIMESTAMP'))
            ->create();
    }
}
