<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quiz Entity
 *
 * @property int $id
 * @property string $quiz_name
 * @property int $status
 * @property int $departments_id
 *
 * @property \App\Model\Entity\Department $department
 */
class Quiz extends Entity
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
        'quiz_name' => true,
        'status' => true,
        'departments_id' => true,
        'department' => true,
    ];
}
