<?php

use Phinx\Seed\AbstractSeed;

class Projects extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = array(
          array(
              'projectid' => 1,
              'project' => 'Project Nova',
              'desc' => 'sample project',
              'visibility' => 'public',
              'created' => time()
          ),
          array(
              'projectid' => 2,
              'project' => 'Project X',
              'desc' => 'sample project',
              'visibility' => 'public',
              'created' => time()
          )
        );
        $table = $this->table('projects');
        $table->insert($data)
              ->save();
    }
}
