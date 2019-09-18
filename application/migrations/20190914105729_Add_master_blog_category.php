<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_master_blog_category extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $attributes = array('ENGINE' => 'InnoDB');
        $this->dbforge->add_field(
            array(
               'master_blogc_id' => array(
                  'type' => 'INT',
                  'constraint' => 5,
                  'unsigned' => true,
                  'auto_increment' => true
               ),
               'blogc_category' => array(
                  'type' => 'varchar',
                  'constraint' => '100',
               ),
               'blogc_description' => array(
                  'type' => 'TEXT',
                  'null' => true,
                  'comment' => 'Isi konten'
               ),
               'created_at' => [
                   'type' => 'DATETIME',
                   'null' => false,
               ],
               'created_by' => [
                   'type' => 'INT',
                   'constraint' => 5,
               ],
               '`updated_at` timestamp not null DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()'
                   
            )
         );
 
         $this->dbforge->add_key('master_blogc_id', TRUE);
         $this->dbforge->create_table('master_bloc_category', FALSE, $attributes);

         $this->dbforge->add_field(
            array(
               'blog_id' => array(
                  'type' => 'INT',
                  'constraint' => 5,
                  'unsigned' => true,
                  'auto_increment' => true
               ),
               'blog_title' => array(
                  'type' => 'varchar',
                  'constraint' => '100',
               ),
               'blog_content' => array(
                  'type' => 'TEXT',
                  'null' => true,
                  'comment' => 'Isi konten'
               ),
               'blog_slug' => [
                   'type' => 'TEXT',
                   'null' => false,
                   'comment' => 'Sesuai dengan Title tapi di url_encode()'
               ],
               'blog_image'=> [
                   'type' => 'TEXT',
                   'null' => false,
               ],
               'created_at' => [
                   'type' => 'DATETIME',
                   'null' => false,
               ],
               'created_by' => [
                   'type' => 'INT',
                   'constraint' => 5,
               ],
               '`updated_at` timestamp not null DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()'
                   
            )
         );
 
         $this->dbforge->add_key('blog_id', TRUE);
         $this->dbforge->create_table('blog', FALSE, $attributes);
         
    }

    public function down() {
        $this->dbforge->drop_table('master_bloc_category');
        $this->dbforge->drop_table('blog');
    }

}

/* End of file Class_name.php */
