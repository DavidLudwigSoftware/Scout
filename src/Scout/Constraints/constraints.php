<?php

return [
    'field' => [
        'accepted'   => 'Scout\Constraints\Field\AcceptedConstraint',
        'alpha'      => 'Scout\Constraints\Field\AlphaConstraint',
        'alnum'      => 'Scout\Constraints\Field\AlphaNumConstraint',
        'between'    => 'Scout\Constraints\Field\BetweenConstraint',
        'boolean'    => 'Scout\Constraints\Field\BooleanConstraint',
        'creditcard' => 'Scout\Constraints\Field\CreditCardConstraint',
        'different'  => 'Scout\Constraints\Field\DifferentConstraint',
        'email'      => 'Scout\Constraints\Field\EmailConstraint',
        'exists'     => 'Scout\Constraints\Field\ExistsConstraint',
        'float'      => 'Scout\Constraints\Field\FloatConstraint',
        'int'        => 'Scout\Constraints\Field\IntegerConstraint',
        'ip'         => 'Scout\Constraints\Field\IPAddressConstraint',
        'ipv4'       => 'Scout\Constraints\Field\IPv4AddressConstraint',
        'ipv6'       => 'Scout\Constraints\Field\IPv6AddressConstraint',
        'json'       => 'Scout\Constraints\Field\JSONConstraint',
        'lenmin'     => 'Scout\Constraints\Field\LenMinConstraint',
        'lenmax'     => 'Scout\Constraints\Field\LenMaxConstraint',
        'mac'        => 'Scout\Constraints\Field\MACAddressConstraint',
        'matches'    => 'Scout\Constraints\Field\MatchesConstraint',
        'max'        => 'Scout\Constraints\Field\MaxConstraint',
        'min'        => 'Scout\Constraints\Field\MinConstraint',
        'num'        => 'Scout\Constraints\Field\NumericConstraint',
        'regexp'     => 'Scout\Constraints\Field\RegExpConstraint',
        'required'   => 'Scout\Constraints\Field\RequiredConstraint',
        'unique'     => 'Scout\Constraints\Field\UniqueConstraint',
        'url'        => 'Scout\Constraints\Field\URLConstraint',
    ],
    'file' => [
        'ext'      => 'Scout\Constraints\File\ExtensionConstraint',
        'image'    => 'Scout\Constraints\File\ImageConstraint',
        'required' => 'Scout\Constraints\File\RequiredConstraint',
    ]
];
