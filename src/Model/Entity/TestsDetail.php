<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TestsDetail Entity
 *
 * @property int $id
 * @property int $quetions_id
 * @property int $tests_id
 * @property int $available_options_values_id
 *
 * @property \App\Model\Entity\Quetion $quetion
 * @property \App\Model\Entity\Test $test
 * @property \App\Model\Entity\Answer $answer
 */
class TestsDetail extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'quetions_id' => true,
        'tests_id' => true,
        'available_options_values_id' => true,
        'quetion' => true,
        'test' => true,
        'answer' => true,
    ];
}
