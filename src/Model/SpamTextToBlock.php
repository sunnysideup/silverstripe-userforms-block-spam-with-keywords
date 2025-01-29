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
        'Title' => 'Keyword',
    ];

    private static $default_sort = 'Title ASC';

    private static $singular_name = 'Spam Text to Block';
    private static $plural_name = 'Spam Texts to Block';

    private static $searchable_fields = [
        'Title',
    ];
    private static $field_labels = [
        'Title' => 'Keyword',
    ];

    private static $indexes = [
        'Title' => true,
    ];
}
