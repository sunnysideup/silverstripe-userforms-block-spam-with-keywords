<?php

namespace Sunnysideup\UserformsBlockSpamWithKeywords\Extension;

use Override;
use SilverStripe\UserForms\Form\UserFormsRequiredFieldsValidator;
use Sunnysideup\UserformsBlockSpamWithKeywords\Model\SpamTextToBlock;

class UserFormValidatorExtension extends UserFormsRequiredFieldsValidator
{
    #[Override]
    public function php($data)
    {
        $list = SpamTextToBlock::get()->column('Title');
        foreach ($data as $key => $value) {
            foreach ($list as $spam) {
                if (stripos((string) $value, (string) $spam) !== false) {
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
