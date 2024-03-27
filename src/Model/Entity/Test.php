<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Test Entity
 *
 * @property int $id
 * @property string $test_name
 * @property int $slots_id
 * @property int $quizs_details_id
 * @property int $status
 *
 * @property \App\Model\Entity\Slot $slot
 * @property \App\Model\Entity\QuizsDetail $quizs_detail
 */
class Test extends Entity
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
        'test_name' => true,
        'slots_id' => true,
        'quizs_details_id' => true,
        'status' => true,
        'slot' => true,
        'quizs_detail' => true,
    ];
}
