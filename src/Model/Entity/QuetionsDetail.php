<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuetionsDetail Entity
 *
 * @property int $id
 * @property int $quetions_id
 * @property string $answers_options_key
 * @property string $answers_options_value
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Quetion $quetion
 */
class QuetionsDetail extends Entity
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
        'answers_options_key' => true,
        'answers_options_value' => true,
        'created' => true,
        'modified' => true,
        'quetion' => true,
    ];
}
