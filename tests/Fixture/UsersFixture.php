<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'firstname' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nickname' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lastname' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'gender' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '0 - Masc\\n1 - Fem\\n2 - Outro', 'precision' => null, 'autoIncrement' => null],
        'academies_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'associations_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'borndate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'Data de Nascimento', 'precision' => null],
        'weight' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'peso'],
        'height' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'enrollment_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'data de matrícula', 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'annuity' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'anuidade paga', 'precision' => null],
        'password' => ['type' => 'string', 'length' => 256, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'borncity' => ['type' => 'string', 'length' => 60, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'states_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'estado/país de nascimento', 'precision' => null, 'autoIncrement' => null],
        'token' => ['type' => 'string', 'length' => 4, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'token de acesso mobile', 'precision' => null, 'fixed' => null],
        'accesses' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'type' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'Os níveis mais altos englobam também as permissões mais baixas
0 - Aluno/Atleta
1 - Professor
2 - Árbitro
3 - Diretor federação
4 - Administração geral', 'precision' => null, 'autoIncrement' => null],
        'countries_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_academies_users_idx' => ['type' => 'index', 'columns' => ['academies_id'], 'length' => []],
            'FK_associations_users_idx' => ['type' => 'index', 'columns' => ['academies_id'], 'length' => []],
            'FK_states_users_idx' => ['type' => 'index', 'columns' => ['states_id'], 'length' => []],
            'FK_countries_users_idx' => ['type' => 'index', 'columns' => ['countries_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_academies_users' => ['type' => 'foreign', 'columns' => ['academies_id'], 'references' => ['academies', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_associations_users' => ['type' => 'foreign', 'columns' => ['associations_id'], 'references' => ['associations', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_countries_users' => ['type' => 'foreign', 'columns' => ['countries_id'], 'references' => ['countries', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_states_users' => ['type' => 'foreign', 'columns' => ['states_id'], 'references' => ['states', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'firstname' => 'Lorem ipsum dolor sit amet',
                'nickname' => 'Lorem ipsum dolor sit amet',
                'lastname' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'gender' => 1,
                'academies_id' => 1,
                'created' => '2019-08-29 22:47:40',
                'modified' => '2019-08-29 22:47:40',
                'borndate' => '2019-08-29',
                'weight' => 1.5,
                'height' => 1.5,
                'enrollment_date' => '2019-08-29',
                'active' => 1,
                'annuity' => 1,
                'password' => 'Lorem ipsum dolor sit amet',
                'borncity' => 'Lorem ipsum dolor sit amet',
                'states_id' => 1,
                'token' => 'Lo',
                'accesses' => 1,
                'type' => 1,
                'countries_id' => 1
            ],
        ];
        parent::init();
    }
}
