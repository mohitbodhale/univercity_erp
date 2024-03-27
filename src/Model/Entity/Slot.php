<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Slot Entity
 *
 * @property int $id
 * @property string $slots_name
 * @property \Cake\I18n\FrozenTime $start_time
 * @property \Cake\I18n\FrozenTime $end_time
 */
class Slot extends Entity
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
        'slots_name' => true,
        'start_time' => true,
        'end_time' => true,
    ];
}
