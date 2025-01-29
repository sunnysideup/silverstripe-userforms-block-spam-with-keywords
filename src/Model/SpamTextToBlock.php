<?php

namespace Sunnysideup\UserformsBlockSpamWithKeywords\Model;

use SilverStripe\ORM\DataObject;

class SpamTextToBlock extends DataObject
{
    private static $table_name = 'SpamTextToBlock';

    private static $db = [
        'Title' => 'Varchar(255)',
    ];

    private static $summary_fields = [
        'Title' => 'Keyword to Block',
    ];

    private static $default_sort = 'Title ASC';

    private static $singular_name = 'Spam Phrase';
    private static $plural_name = 'Spam Phrases';

    private static $searchable_fields = [
        'Title',
    ];
    private static $field_labels = [
        'Title' => 'Keyword to Block - e.g. viagra',
    ];

    private static $indexes = [
        'Title' => true,
    ];
}
