<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_post'       => ['type'  => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_user'       => ['type'  => 'int', 'constraint' => 11, 'unsigned' => true],
            'image'         => ['type'  => 'varchar', 'constraint'  => 255],
            'caption'       => ['type'  => 'text'],
            'tanggal'       => ['type'  => 'datetime'],
            'created_at'    => ['type'  => 'datetime', 'null' => true],
            'updated_at'    => ['type'  => 'datetime', 'null' => true],
            'deleted_at'    =>  ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id_post', true);
        $this->forge->addForeignKey('id_user', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('posts', true);

        $this->forge->addField([
            'id_comment'    => ['type'  => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_post'       => ['type'  => 'int', 'constraint' => 11, 'unsigned' => true],
            'id_user'       => ['type'  => 'int', 'constraint' => 11, 'unsigned' => true],
            'comment'       => ['type'  => 'text'],
            'tanggal'       => ['type'  => 'datetime'],
            'created_at'    => ['type'  => 'datetime', 'null' => true],
            'updated_at'    => ['type'  => 'datetime', 'null' => true],
            'deleted_at'    =>  ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_comment', true);
        $this->forge->addForeignKey('id_post', 'posts', 'id_post', '', 'CASCADE');
        $this->forge->addForeignKey('id_user', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('comments', true);

        $this->forge->addField([
            'id_like'       => ['type'  => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_post'       => ['type'  => 'int', 'constraint' => 11, 'unsigned' => true],
            'id_user'       => ['type'  => 'int', 'constraint' => 11, 'unsigned' => true],
            'tanggal'       => ['type'  => 'datetime'],
            'created_at'    => ['type'  => 'datetime', 'null' => true],
            'updated_at'    => ['type'  => 'datetime', 'null' => true],
            'deleted_at'    =>  ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_like', true);
        $this->forge->addForeignKey('id_post', 'posts', 'id_post', '', 'CASCADE');
        $this->forge->addForeignKey('id_user', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('likes', true);
    }

    public function down()
    {
        $this->forge->dropTable('posts');
        $this->forge->dropTable('comments');
        $this->forge->dropTable('likes');
    }
}