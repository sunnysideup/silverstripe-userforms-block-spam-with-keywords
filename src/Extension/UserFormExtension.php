<?php

namespace Sunnysideup\UserformsBlockSpamWithKeywords\Extension;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Sunnysideup\UserformsBlockSpamWithKeywords\Model\SpamTextToBlock;

class UserFormExtension extends Extension
{
    public function updateCMSFields($fields)
    {
        $fields->addFieldsToTab(
            'Root.Spam',
            [
                GridField::create(
                    'SpamTextToBlock',
                    'Spam Text to Block',
                    SpamTextToBlock::get(),
                    GridFieldConfig_RecordEditor::create()
                )
            ]
        );
    }
}
