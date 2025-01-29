<?php

namespace Sunnysideup\UserformsBlockSpamWithKeywords\Extension;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Sunnysideup\UserformsBlockSpamWithKeywords\Model\SpamTextToBlock;

class UserFormExtension extends Extension
{
    public function updateFormOptions($options)
    {
        $options->push(
            GridField::create(
                'SpamTextToBlock',
                'Spam Text to Block',
                SpamTextToBlock::get(),
                GridFieldConfig_RecordEditor::create()
            )
        );
        return $options;
    }
}
