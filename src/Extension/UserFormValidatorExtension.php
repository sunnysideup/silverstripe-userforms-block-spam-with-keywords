<?php

namespace Sunnysideup\UserformsBlockSpamWithKeywords\Extension;

use SilverStripe\UserForms\Form\UserFormsRequiredFields;
use Sunnysideup\UserformsBlockSpamWithKeywords\Model\SpamTextToBlock;

class UserFormValidatorExtension extends UserFormsRequiredFields
{
    public function php($data)
    {
        // blank keywords would match everything
        $list = array_values(array_filter(
            array_map(static fn ($title): string => trim((string) $title), SpamTextToBlock::get()->column('Title')),
            static fn (string $title): bool => $title !== ''
        ));
        foreach ($data as $key => $value) {
            // values can be arrays (e.g. checkbox sets, file uploads)
            $strings = [];
            if (is_array($value)) {
                array_walk_recursive($value, static function ($v) use (&$strings) {
                    if (is_scalar($v)) {
                        $strings[] = (string) $v;
                    }
                });
            } elseif (is_scalar($value)) {
                $strings[] = (string) $value;
            }

            foreach ($strings as $string) {
                foreach ($list as $spam) {
                    if (stripos($string, $spam) !== false) {
                        $this->validationError(
                            $key,
                            'This field contains a keyword that is not allowed.',
                            'error'
                        );
                        return false;
                    }
                }
            }
        }
        return parent::php($data);
    }
}
