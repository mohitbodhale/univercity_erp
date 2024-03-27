<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuizsDetail Entity
 *
 * @property int $id
 * @property int $quizs_id
 * @property int $slots_id
 *
 * @property \App\Model\Entity\Quiz $quiz
 * @property \App\Model\Entity\Slot $slot
 */
class QuizsDetail extends Entity
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
        'quizs_id' => true,
        'slots_id' => true,
        'quiz' => true,
        'slot' => true,
    ];
}
