<?php

namespace Sunnysideup\UserformsBlockSpamWithKeywords\Extension;

use SilverStripe\UserForms\Extension\UserFormValidator;
use Sunnysideup\UserformsBlockSpamWithKeywords\Model\SpamTextToBlock;

class UserFormValidatorExtension extends UserFormValidator
{
    public function php($data)
    {
        $list = SpamTextToBlock::get()->column('Title');
        foreach ($data as $key => $value) {
            foreach ($list as $spam) {
                if (stripos($value, $spam) !== false) {
                    $this->validationError(
                        $key,
                        'This field contains a keyword that is not allowed.',
                        'error'
                    );
                    return false;
                }
            }
        }
        return parent::php($data);
    }
}
