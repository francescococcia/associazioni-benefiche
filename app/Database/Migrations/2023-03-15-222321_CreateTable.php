<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTable extends Migration
{
  public function up()
  {
    // Create table users
    $this->forge->addField([
      'id' => [
          'type' => 'INT',
          'unsigned' => true,
          'auto_increment' => true,
      ],
      'first_name' => [
          'type' => 'VARCHAR',
          'constraint' => 255,
          'null' => true,
      ],
      'last_name' => [
          'type' => 'VARCHAR',
          'constraint' => 255,
          'null' => true,
      ],
      'phone_number' => [
          'type' => 'VARCHAR',
          'constraint' => 20,
          'null' => true,
      ],
      'birth_date' => [
          'type' => 'DATE',
          'null' => true,
      ],
      'email' => [
          'type' => 'VARCHAR',
          'constraint' => 255,
      ],
      'password' => [
          'type' => 'VARCHAR',
          'constraint' => 255,
      ],
      'is_admin' => [
          'type' => 'TINYINT',
          'constraint' => 1,
          'default' => 0,
      ],
      'is_platform_manager' => [
          'type' => 'TINYINT',
          'constraint' => 1,
          'default' => 0,
      ],
  ]);

  $this->forge->addPrimaryKey('id');
  $this->forge->createTable('users');

  // Create table associations
  $this->forge->addField([
  'id' => [
    'type' => 'INT',
    'constraint' => 11,
    'unsigned' => true,
    'auto_increment' => true
  ],
  'user_id' => [
    'type' => 'INT',
    'constraint' => 11,
    'unsigned' => true,
  ],
  'name' => [
      'type' => 'VARCHAR',
      'constraint' => 255
  ],
  'legal_address' => [
      'type' => 'VARCHAR',
      'constraint' => 255
  ],
  'tax_code' => [
      'type' => 'VARCHAR',
      'constraint' => 255
  ] 
  ]);
  $this->forge->addPrimaryKey('id');
  $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
  $this->forge->createTable('associations');

  // Create table events
  $this->forge->addField([
      'id' => [
          'type' => 'INT',
          'constraint' => 11,
          'unsigned' => true,
          'auto_increment' => true
      ],
      'association_id' => [
          'type' => 'INT',
          'constraint' => 11,
          'unsigned' => true
      ],
      'title' => [
          'type' => 'VARCHAR',
          'constraint' => 255
      ],
      'description' => [
          'type' => 'TEXT'
      ],
      'date' => [
          'type' => 'DATETIME'
      ],
      'location' => [
          'type' => 'VARCHAR',
          'constraint' => 255
      ]
  ]);
  $this->forge->addPrimaryKey('id');
  $this->forge->addForeignKey('association_id', 'associations', 'id', 'CASCADE', 'CASCADE');
  $this->forge->createTable('events');

  // Create table products
  $this->forge->addField([
      'id' => [
          'type' => 'INT',
          'constraint' => 11,
          'unsigned' => true,
          'auto_increment' => true
      ],
      'association_id' => [
          'type' => 'INT',
          'constraint' => 11,
          'unsigned' => true
      ],
      'name' => [
          'type' => 'VARCHAR',
          'constraint' => 255
      ],
      'description' => [
          'type' => 'TEXT'
      ],
      'price' => [
          'type' => 'DECIMAL',
          'constraint' => '10,2'
      ]
  ]);
  $this->forge->addPrimaryKey('id');
  $this->forge->addForeignKey('association_id', 'associations', 'id', 'CASCADE', 'CASCADE');
  $this->forge->createTable('products');

  // Create table orders
  $this->forge->addField([
      'id' => [
          'type' => 'INT',
          'constraint' => 11,
          'unsigned' => true,
          'auto_increment' => true,
      ],
      'user_id' => [
          'type' => 'INT',
          'constraint' => 11,
          'unsigned' => true,
      ],
      'product_id' => [
          'type' => 'INT',
          'constraint' => 11,
          'unsigned' => true,
      ],
      'quantity' => [
          'type' => 'INT',
          'constraint' => 11,
          'unsigned' => true,
      ],
      'date' => [
          'type' => 'DATETIME',
      ],
  ]);
  $this->forge->addKey('id', true);
  $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
  $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
  $this->forge->createTable('orders');

    // Create table participants
    $this->forge->addField([
        'id' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'auto_increment' => true,
        ],
        'event_id' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
        ],
        'user_id' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
        ],
        'created_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
        'updated_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
        'deleted_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
    ]);

    $this->forge->addPrimaryKey('id');
    $this->forge->addForeignKey('event_id', 'events', 'id', 'CASCADE', 'CASCADE');
    $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

    $this->forge->createTable('participants');

    // Create table feedbacks
    $this->forge->addField([
        'id' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'auto_increment' => true,
        ],
        'user_id' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
        ],
        'subject' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
        ],
        'message' => [
            'type' => 'TEXT',
        ],
        'created_at' => [
            'type' => 'DATETIME',
        ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('feedbacks');
  }

  public function down()
  {
    $this->forge->dropTable('associations');
    $this->forge->dropTable('events');
    $this->forge->dropTable('products');
    $this->forge->dropTable('orders');
    $this->forge->dropTable('users');
    $this->forge->dropTable('participants');
    $this->forge->dropTable('feedbacks');
  }
}
