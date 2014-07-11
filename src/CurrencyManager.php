<?php

namespace CommerceGuys\Pricing;

/**
 * Manages currencies based on ISO 4217 definitions.
 */
class CurrencyManager implements CurrencyManagerInterface
{

    /**
     * ISO 4217 currency definitions.
     *
     * @var array
     */
    protected $definitions = array(
        'AED' => array(
            'code' => 'AED',
            'name' => 'United Arab Emirates Dirham',
            'number' => '784',
            'symbol' => 'د.إ',
        ),
        'AFN' => array(
            'code' => 'AFN',
            'name' => 'Afghan Afghani',
            'number' => '971',
            'symbol' => 'Af',
            'decimals' => 0,
        ),
        'ALL' => array(
            'code' => 'ALL',
            'name' => 'Albanian Lek',
            'number' => '008',
            'symbol' => 'Lek',
        ),
        'AMD' => array(
            'code' => 'AMD',
            'name' => 'Armenian Dram',
            'number' => '051',
            'symbol' => 'Dram',
        ),
        'ANG' => array(
            'code' => 'ANG',
            'name' => 'Netherlands Antillean Guilder',
            'number' => '532',
            'symbol' => 'NAf.',
        ),
        'AOA' => array(
            'code' => 'AOA',
            'name' => 'Angolan Kwanza',
            'number' => '973',
            'symbol' => 'Kz',
        ),
        'ARS' => array(
            'code' => 'ARS',
            'name' => 'Argentine Peso',
            'number' => '032',
            'symbol' => 'AR$',
        ),
        'AUD' => array(
            'code' => 'AUD',
            'name' => 'Australian Dollar',
            'number' => '036',
            'symbol' => '$',
        ),
        'AWG' => array(
            'code' => 'AWG',
            'name' => 'Aruban Florin',
            'number' => '533',
            'symbol' => 'Afl.',
        ),
        'AZN' => array(
            'code' => 'AZN',
            'name' => 'Azerbaijanian Manat',
            'number' => '944',
            'symbol' => 'man.',
        ),
        'BAM' => array(
            'code' => 'BAM',
            'name' => 'Bosnia-Herzegovina Convertible Mark',
            'number' => '977',
            'symbol' => 'KM',
        ),
        'BBD' => array(
            'code' => 'BBD',
            'name' => 'Barbadian Dollar',
            'number' => '052',
            'symbol' => 'Bds$',
        ),
        'BDT' => array(
            'code' => 'BDT',
            'name' => 'Bangladeshi Taka',
            'number' => '050',
            'symbol' => 'Tk',
        ),
       'BGN' => array(
            'code' => 'BGN',
            'name' => 'Bulgarian lev',
            'number' => '975',
            'symbol' => 'лв',
        ),
        'BHD' => array(
            'code' => 'BHD',
            'name' => 'Bahraini Dinar',
            'number' => '048',
            'symbol' => 'BD',
            'decimals' => 3,
        ),
        'BIF' => array(
            'code' => 'BIF',
            'name' => 'Burundian Franc',
            'number' => '108',
            'symbol' => 'FBu',
            'decimals' => 0,
        ),
        'BMD' => array(
            'code' => 'BMD',
            'name' => 'Bermudan Dollar',
            'number' => '060',
            'symbol' => 'BD$',
        ),
        'BND' => array(
            'code' => 'BND',
            'name' => 'Brunei Dollar',
            'number' => '096',
            'symbol' => 'BN$',
        ),
        'BOB' => array(
            'code' => 'BOB',
            'name' => 'Bolivian Boliviano',
            'number' => '068',
            'symbol' => 'Bs',
        ),
        'BRL' => array(
            'code' => 'BRL',
            'name' => 'Brazilian Real',
            'number' => '986',
            'symbol' => 'R$',
        ),
        'BSD' => array(
            'code' => 'BSD',
            'name' => 'Bahamian Dollar',
            'number' => '044',
            'symbol' => 'BS$',
        ),
        'BTN' => array(
            'code' => 'BTN',
            'name' => 'Bhutanese Ngultrum',
            'number' => '064',
            'symbol' => 'Nu.',
        ),
        'BWP' => array(
            'code' => 'BWP',
            'name' => 'Botswanan Pula',
            'number' => '072',
            'symbol' => 'BWP',
        ),
        'BYR' => array(
            'code' => 'BYR',
            'name' => 'Belarusian ruble',
            'number' => '974',
            'symbol' => 'руб.',
            'decimals' => 0,
        ),
        'BZD' => array(
            'code' => 'BZD',
            'name' => 'Belize Dollar',
            'number' => '084',
            'symbol' => 'BZ$',
        ),
        'CAD' => array(
            'code' => 'CAD',
            'name' => 'Canadian Dollar',
            'number' => '124',
            'symbol' => 'CA$',
        ),
        'CDF' => array(
            'code' => 'CDF',
            'name' => 'Congolese Franc',
            'number' => '976',
            'symbol' => 'CDF',
        ),
        'CHF' => array(
            'code' => 'CHF',
            'name' => 'Swiss Franc',
            'number' => '756',
            'symbol' => 'Fr.',
        ),
        'CLP' => array(
            'code' => 'CLP',
            'name' => 'Chilean Peso',
            'number' => '152',
            'symbol' => 'CL$',
            'decimals' => 0,
        ),
        'CNY' => array(
            'code' => 'CNY',
            'name' => 'Chinese Yuan Renminbi',
            'number' => '156',
            'symbol' => '¥',
        ),
        'COP' => array(
            'code' => 'COP',
            'name' => 'Colombian Peso',
            'number' => '170',
            'symbol' => '$',
            'decimals' => 0,
        ),
        'CRC' => array(
            'code' => 'CRC',
            'name' => 'Costa Rican Colón',
            'number' => '188',
            'symbol' => '¢',
            'decimals' => 0,
        ),
        'CUC' => array(
            'code' => 'CUC',
            'name' => 'Cuban Convertible Peso',
            'number' => 931,
            'symbol' => 'CUC$',
        ),
        'CUP' => array(
            'code' => 'CUP',
            'name' => 'Cuban Peso',
            'number' => '192',
            'symbol' => 'CU$',
        ),
        'CVE' => array(
            'code' => 'CVE',
            'name' => 'Cape Verdean Escudo',
            'number' => '132',
            'symbol' => 'CV$',
        ),
        'CZK' => array(
            'code' => 'CZK',
            'name' => 'Czech Republic Koruna',
            'number' => '203',
            'symbol' => 'Kč',
        ),
        'DJF' => array(
            'code' => 'DJF',
            'name' => 'Djiboutian Franc',
            'number' => '262',
            'symbol' => 'Fdj',
            'decimals' => 0,
        ),
        'DKK' => array(
            'code' => 'DKK',
            'name' => 'Danish Krone',
            'number' => '208',
            'symbol' => 'kr.',
        ),
        'DOP' => array(
            'code' => 'DOP',
            'name' => 'Dominican Peso',
            'number' => '214',
            'symbol' => 'RD$',
        ),
        'DZD' => array(
            'code' => 'DZD',
            'name' => 'Algerian Dinar',
            'number' => '012',
            'symbol' => 'DA',
        ),
        'EEK' => array(
            'code' => 'EEK',
            'name' => 'Estonian Kroon',
            'number' => '233',
            'symbol' => 'Ekr',
        ),
        'EGP' => array(
            'code' => 'EGP',
            'name' => 'Egyptian Pound',
            'number' => '818',
            'symbol' => 'EG£',
        ),
        'ERN' => array(
            'code' => 'ERN',
            'name' => 'Eritrean Nakfa',
            'number' => '232',
            'symbol' => 'Nfk',
        ),
        'ETB' => array(
            'code' => 'ETB',
            'name' => 'Ethiopian Birr',
            'number' => '230',
            'symbol' => 'Br',
        ),
        'EUR' => array(
            'code' => 'EUR',
            'name' => 'Euro',
            'number' => '978',
            'symbol' => '€',
        ),
        'FJD' => array(
            'code' => 'FJD',
            'name' => 'Fijian Dollar',
            'number' => '242',
            'symbol' => 'FJ$',
        ),
        'FKP' => array(
            'code' => 'FKP',
            'name' => 'Falkland Islands Pound',
            'number' => '238',
            'symbol' => 'FK£',
        ),
        'GBP' => array(
            'code' => 'GBP',
            'name' => 'British Pound Sterling',
            'number' => '826',
            'symbol' => '£',
        ),
        'GEL' => array(
            'code' => 'GEL',
            'name' => 'Georgian Lari',
            'number' => '981',
            'symbol' => 'ლ',
        ),
        'GHS' => array(
            'code' => 'GHS',
            'name' => 'Ghanaian Cedi',
            'number' => '936',
            'symbol' => 'GH₵',
        ),
        'GIP' => array(
            'code' => 'GIP',
            'name' => 'Gibraltar Pound',
            'number' => '292',
            'symbol' => 'GI£',
        ),
        'GMD' => array(
            'code' => 'GMD',
            'name' => 'Gambian Dalasi',
            'number' => '270',
            'symbol' => 'GMD',
        ),
        'GNF' => array(
            'code' => 'GNF',
            'name' => 'Guinean Franc',
            'number' => '324',
            'symbol' => 'FG',
            'decimals' => 0,
        ),
        'GTQ' => array(
            'code' => 'GTQ',
            'name' => 'Guatemalan Quetzal',
            'number' => '320',
            'symbol' => 'GTQ',
        ),
        'GYD' => array(
            'code' => 'GYD',
            'name' => 'Guyanaese Dollar',
            'number' => '328',
            'symbol' => 'GY$',
            'decimals' => 0,
        ),
        'HKD' => array(
            'code' => 'HKD',
            'name' => 'Hong Kong Dollar',
            'number' => '344',
            'symbol' => 'HK$',
        ),
        'HNL' => array(
            'code' => 'HNL',
            'name' => 'Honduran Lempira',
            'number' => '340',
            'symbol' => 'HNL',
        ),
        'HRK' => array(
            'code' => 'HRK',
            'name' => 'Croatian Kuna',
            'number' => '191',
            'symbol' => 'kn',
        ),
        'HTG' => array(
            'code' => 'HTG',
            'name' => 'Haitian Gourde',
            'number' => '332',
            'symbol' => 'HTG',
        ),
        'HUF' => array(
            'code' => 'HUF',
            'name' => 'Hungarian Forint',
            'number' => '348',
            'symbol' => 'Ft',
            'decimals' => 0,
        ),
        'IDR' => array(
            'code' => 'IDR',
            'name' => 'Indonesian Rupiah',
            'number' => '360',
            'symbol' => 'Rp',
            'decimals' => 0,
        ),
        'ILS' => array(
            'code' => 'ILS',
            'name' => 'Israeli New Shekel',
            'number' => '376',
            'symbol' => '₪'
        ),
        'INR' => array(
            'code' => 'INR',
            'name' => 'Indian Rupee',
            'number' => '356',
            'symbol' => 'Rs',
        ),
        'IRR' => array(
            'code' => 'IRR',
            'name' => 'Iranian Rial',
            'number' => '364',
            'symbol' => '﷼',
        ),
        'ISK' => array(
            'code' => 'ISK',
            'name' => 'Icelandic Króna',
            'number' => '352',
            'symbol' => 'Ikr',
            'decimals' => 0,
        ),
        'JMD' => array(
            'code' => 'JMD',
            'name' => 'Jamaican Dollar',
            'number' => '388',
            'symbol' => 'J$',
        ),
        'JOD' => array(
            'code' => 'JOD',
            'name' => 'Jordanian Dinar',
            'number' => '400',
            'symbol' => 'JD',
            'decimals' => 3,
        ),
        'JPY' => array(
            'code' => 'JPY',
            'name' => 'Japanese Yen',
            'number' => '392',
            'symbol' => '¥',
            'decimals' => 0,
        ),
        'KES' => array(
            'code' => 'KES',
            'name' => 'Kenyan Shilling',
            'number' => '404',
            'symbol' => 'Ksh',
        ),
        'KGS' => array(
            'code' => 'KGS',
            'name' => 'Kyrgyzstani Som',
            'number' => '417',
            'symbol' => 'сом',
        ),
        'KMF' => array(
            'code' => 'KMF',
            'name' => 'Comorian Franc',
            'number' => '174',
            'symbol' => 'CF',
            'decimals' => 0,
        ),
        'KRW' => array(
            'code' => 'KRW',
            'name' => 'South Korean Won',
            'number' => '410',
            'symbol' => '₩',
            'decimals' => 0,
        ),
        'KWD' => array(
            'code' => 'KWD',
            'name' => 'Kuwaiti Dinar',
            'decimals' => 3,
            'number' => '414',
            'symbol' => 'KD',
        ),
        'KYD' => array(
            'code' => 'KYD',
            'name' => 'Cayman Islands Dollar',
            'number' => '136',
            'symbol' => 'KY$',
        ),
        'KZT' => array(
            'code' => 'KZT',
            'name' => 'Kazakhstani tenge',
            'number' => '398',
            'symbol' => 'тг.',
        ),
        'LAK' => array(
            'code' => 'LAK',
            'name' => 'Laotian Kip',
            'number' => '418',
            'symbol' => '₭N',
            'decimals' => 0,
        ),
        'LBP' => array(
            'code' => 'LBP',
            'name' => 'Lebanese Pound',
            'number' => '422',
            'symbol' => 'LB£',
            'decimals' => 0,
        ),
        'LKR' => array(
            'code' => 'LKR',
            'name' => 'Sri Lanka Rupee',
            'number' => '144',
            'symbol' => 'SLRs',
        ),
        'LRD' => array(
            'code' => 'LRD',
            'name' => 'Liberian Dollar',
            'number' => '430',
            'symbol' => 'L$',
        ),
        'LSL' => array(
            'code' => 'LSL',
            'name' => 'Lesotho Loti',
            'number' => '426',
            'symbol' => 'LSL',
        ),
        'LTL' => array(
            'code' => 'LTL',
            'name' => 'Lithuanian Litas',
            'number' => '440',
            'symbol' => 'Lt',
        ),
        'LVL' => array(
            'code' => 'LVL',
            'name' => 'Latvian Lats',
            'number' => '428',
            'symbol' => 'Ls',
        ),
        'LYD' => array(
            'code' => 'LYD',
            'name' => 'Libyan Dinar',
            'number' => '434',
            'symbol' => 'LD',
            'decimals' => 3,
        ),
        'MAD' => array(
            'code' => 'MAD',
            'name' => 'Moroccan Dirham',
            'number' => '504',
            'symbol' => 'Dhs',
        ),
        'MDL' => array(
            'code' => 'MDL',
            'name' => 'Moldovan leu',
            'number' => '498',
            'symbol' => 'MDL',
        ),
        'MGA' => array(
            'code' => 'MGA',
            'name' => 'Malagasy ariary',
            'number' => '969',
            'symbol' => 'Ar',
        ),
        'MKD' => array(
            'code' => 'MKD',
            'name' => 'Macedonian denar',
            'number' => '807',
            'symbol' => 'ден',
        ),
        'MMK' => array(
            'code' => 'MMK',
            'name' => 'Myanma Kyat',
            'number' => '104',
            'symbol' => 'MMK',
            'decimals' => 0,
        ),
        'MNT' => array(
            'code' => 'MNT',
            'name' => 'Mongolian Tugrik',
            'number' => '496',
            'symbol' => '₮',
            'decimals' => 0,
        ),
        'MOP' => array(
            'code' => 'MOP',
            'name' => 'Macanese Pataca',
            'number' => '446',
            'symbol' => 'MOP$',
        ),
        'MRO' => array(
            'code' => 'MRO',
            'name' => 'Mauritanian Ouguiya',
            'number' => '478',
            'symbol' => 'UM',
            'decimals' => 0,
        ),
        'MUR' => array(
            'code' => 'MUR',
            'name' => 'Mauritian Rupee',
            'number' => '480',
            'symbol' => 'MURs',
            'decimals' => 0,
        ),
        'MXN' => array(
            'code' => 'MXN',
            'name' => 'Mexican Peso',
            'number' => '484',
            'symbol' => '$',
        ),
        'MYR' => array(
            'code' => 'MYR',
            'name' => 'Malaysian Ringgit',
            'number' => '458',
            'symbol' => 'RM',
        ),
        'MZN' => array(
            'code' => 'MZN',
            'name' => 'Mozambican Metical',
            'number' => '943',
            'symbol' => 'MTn',
        ),
        'NAD' => array(
            'code' => 'NAD',
            'name' => 'Namibian Dollar',
            'number' => '516',
            'symbol' => 'N$',
        ),
        'NGN' => array(
            'code' => 'NGN',
            'name' => 'Nigerian Naira',
            'number' => '566',
            'symbol' => '₦',
        ),
        'NIO' => array(
            'code' => 'NIO',
            'name' => 'Nicaraguan Cordoba Oro',
            'number' => '558',
            'symbol' => 'C$',
        ),
        'NOK' => array(
            'code' => 'NOK',
            'name' => 'Norwegian Krone',
            'number' => '578',
            'symbol' => 'Nkr',
        ),
        'NPR' => array(
            'code' => 'NPR',
            'name' => 'Nepalese Rupee',
            'number' => '524',
            'symbol' => 'NPRs',
        ),
        'NZD' => array(
            'code' => 'NZD',
            'name' => 'New Zealand Dollar',
            'number' => '554',
            'symbol' => '$',
        ),
        'OMR' => array(
            'code' => 'OMR',
            'name' => 'Omani Rial',
            'number' => '512',
            'symbol' => 'ر.ع.',
            'decimals' => 3,
        ),
        'PAB' => array(
            'code' => 'PAB',
            'name' => 'Panamanian Balboa',
            'number' => '590',
            'symbol' => 'B/.',
        ),
        'PEN' => array(
            'code' => 'PEN',
            'name' => 'Peruvian Nuevo Sol',
            'number' => '604',
            'symbol' => 'S/.',
        ),
        'PGK' => array(
            'code' => 'PGK',
            'name' => 'Papua New Guinean Kina',
            'number' => '598',
            'symbol' => 'PGK',
        ),
        'PHP' => array(
            'code' => 'PHP',
            'name' => 'Philippine Peso',
            'number' => '608',
            'symbol' => '₱',
        ),
        'PKR' => array(
            'code' => 'PKR',
            'name' => 'Pakistani Rupee',
            'number' => '586',
            'symbol' => 'PKRs',
            'decimals' => 0,
        ),
        'PLN' => array(
            'code' => 'PLN',
            'name' => 'Polish Złoty',
            'number' => '985',
            'symbol' => 'zł',
        ),
        'PYG' => array(
            'code' => 'PYG',
            'name' => 'Paraguayan Guarani',
            'number' => '600',
            'symbol' => '₲',
            'decimals' => 0,
        ),
        'QAR' => array(
            'code' => 'QAR',
            'name' => 'Qatari Rial',
            'number' => '634',
            'symbol' => 'QR',
        ),
        'RON' => array(
            'code' => 'RON',
            'name' => 'Romanian Leu',
            'number' => '946',
            'symbol' => 'RON',
        ),
        'RSD' => array(
            'code' => 'RSD',
            'name' => 'Serbian Dinar',
            'number' => '941',
            'symbol' => 'din.',
            'decimals' => 0,
        ),
        'RUB' => array(
            'code' => 'RUB',
            'name' => 'Russian Ruble',
            'number' => '643',
            'symbol' => 'руб.',
        ),
        'SAR' => array(
            'code' => 'SAR',
            'name' => 'Saudi Riyal',
            'number' => '682',
            'symbol' => 'SR',
        ),
        'SBD' => array(
            'code' => 'SBD',
            'name' => 'Solomon Islands Dollar',
            'number' => '090',
            'symbol' => 'SI$',
        ),
        'SCR' => array(
            'code' => 'SCR',
            'name' => 'Seychellois Rupee',
            'number' => '690',
            'symbol' => 'SRe',
        ),
        'SDD' => array(
            'code' => 'SDD',
            'name' => 'Old Sudanese Dinar',
            'number' => '736',
            'symbol' => 'LSd',
        ),
        'SEK' => array(
            'code' => 'SEK',
            'name' => 'Swedish Krona',
            'number' => '752',
            'symbol' => 'kr',
        ),
        'SGD' => array(
            'code' => 'SGD',
            'name' => 'Singapore Dollar',
            'number' => '702',
            'symbol' => 'S$',
        ),
        'SHP' => array(
            'code' => 'SHP',
            'name' => 'Saint Helena Pound',
            'number' => '654',
            'symbol' => 'SH£',
        ),
        'SLL' => array(
            'code' => 'SLL',
            'name' => 'Sierra Leonean Leone',
            'number' => '694',
            'symbol' => 'Le',
            'decimals' => 0,
        ),
        'SOS' => array(
            'code' => 'SOS',
            'name' => 'Somali Shilling',
            'number' => '706',
            'symbol' => 'Ssh',
            'decimals' => 0,
        ),
        'SRD' => array(
            'code' => 'SRD',
            'name' => 'Surinamese Dollar',
            'number' => '968',
            'symbol' => 'SR$',
        ),
        'STD' => array(
            'code' => 'STD',
            'name' => 'São Tomé and Príncipe Dobra',
            'number' => '678',
            'symbol' => 'Db',
            'decimals' => 0,
        ),
        'SYP' => array(
            'code' => 'SYP',
            'name' => 'Syrian Pound',
            'number' => '760',
            'symbol' => 'SY£',
            'decimals' => 0,
        ),
        'SZL' => array(
            'code' => 'SZL',
            'name' => 'Swazi Lilangeni',
            'number' => '748',
            'symbol' => 'SZL',
        ),
        'THB' => array(
            'code' => 'THB',
            'name' => 'Thai Baht',
            'number' => '764',
            'symbol' => '฿',
        ),
        'TJS' => array(
            'code' => 'TJS',
            'name' => 'Tajikistani Somoni',
            'number' => '972',
            'symbol' => 'diram',
        ),
        'TMT' => array(
            'code' => 'TMT',
            'name' => 'Turkmenistan manat',
            'number' => '934',
            'symbol' => 'T',
        ),
        'TND' => array(
            'code' => 'TND',
            'name' => 'Tunisian Dinar',
            'number' => '788',
            'symbol' => 'DT',
            'decimals' => 3,
        ),
        'TOP' => array(
            'code' => 'TOP',
            'name' => 'Tongan Paʻanga',
            'number' => '776',
            'symbol' => 'T$',
        ),
        'TRY' => array(
            'code' => 'TRY',
            'name' => 'Turkish Lira',
            'number' => '949',
            'symbol' => 'TL',
        ),
        'TTD' => array(
            'code' => 'TTD',
            'name' => 'Trinidad and Tobago Dollar',
            'number' => '780',
            'symbol' => 'TT$',
        ),
        'TWD' => array(
            'code' => 'TWD',
            'name' => 'New Taiwan Dollar',
            'number' => '901',
            'symbol' => 'NT$',
        ),
        'TZS' => array(
            'code' => 'TZS',
            'name' => 'Tanzanian Shilling',
            'number' => '834',
            'symbol' => 'TSh',
            'decimals' => 0,
        ),
        'UAH' => array(
            'code' => 'UAH',
            'name' => 'Ukrainian Hryvnia',
            'number' => '980',
            'symbol' => 'грн.',
        ),
        'UGX' => array(
            'code' => 'UGX',
            'name' => 'Ugandan Shilling',
            'number' => '800',
            'symbol' => 'USh',
            'decimals' => 0,
        ),
        'USD' => array(
            'code' => 'USD',
            'name' => 'United States Dollar',
            'number' => '840',
            'symbol' => '$',
        ),
        'UYU' => array(
            'code' => 'UYU',
            'name' => 'Uruguayan Peso',
            'number' => '858',
            'symbol' => '$U',
        ),
        'VEF' => array(
            'code' => 'VEF',
            'name' => 'Venezuelan Bolívar Fuerte',
            'number' => '937',
            'symbol' => 'Bs.F.',
        ),
        'VND' => array(
            'code' => 'VND',
            'name' => 'Vietnamese Dong',
            'number' => '704',
            'symbol' => 'đ',
            'decimals' => 0,
        ),
        'VUV' => array(
            'code' => 'VUV',
            'name' => 'Vanuatu Vatu',
            'number' => '548',
            'symbol' => 'VT',
            'decimals' => 0,
        ),
        'WST' => array(
            'code' => 'WST',
            'name' => 'Samoan Tala',
            'number' => '882',
            'symbol' => 'WS$',
        ),
        'XAF' => array(
            'code' => 'XAF',
            'name' => 'CFA Franc BEAC',
            'number' => '950',
            'symbol' => 'FCFA',
            'decimals' => 0,
        ),
        'XCD' => array(
            'code' => 'XCD',
            'name' => 'East Caribbean Dollar',
            'number' => '951',
            'symbol' => 'EC$',
        ),
        'XOF' => array(
            'code' => 'XOF',
            'name' => 'CFA Franc BCEAO',
            'number' => '952',
            'symbol' => 'CFA',
            'decimals' => 0,
        ),
        'XPF' => array(
            'code' => 'XPF',
            'name' => 'CFP Franc',
            'number' => '953',
            'symbol' => 'CFPF',
            'decimals' => 0,
        ),
        'YER' => array(
            'code' => 'YER',
            'name' => 'Yemeni Rial',
            'number' => '886',
            'symbol' => 'YR',
            'decimals' => 0,
        ),
        'ZAR' => array(
            'code' => 'ZAR',
            'name' => 'South African Rand',
            'number' => '710',
            'symbol' => 'R',
        ),
        'ZMK' => array(
            'code' => 'ZMK',
            'name' => 'Zambian Kwacha',
            'number' => '894',
            'symbol' => 'ZK',
            'decimals' => 0,
        ),
    );

    /**
     * {@inheritdoc}
     */
    public function getCurrency($currencyCode) {
        if (!isset($this->definitions[$currencyCode])) {
            throw new UnknownCurrencyException($currencyCode);
        }

        return $this->createCurrencyFromDefinition($this->definitions[$currencyCode]);
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrencies() {
        $currencies = array();
        foreach ($this->definitions as $currencyCode => $definition) {
            $currencies[$currencyCode] = $this->createCurrencyFromDefinition($definition);
        }

        return $currencies;
    }

    /**
     * Creates a currency object from the provided definition.
     *
     * @param array $definition The ISO 4217 definition.
     *
     * @return \CommerceGuys\Pricing\Currency
     */
    protected function createCurrencyFromDefinition(array $definition) {
        $definition += array(
            'decimals' => 2,
        );

        $currency = new Currency();
        $currency->setCode($definition['code']);
        $currency->setName($definition['name']);
        $currency->setNumber($definition['number']);
        $currency->setDecimals($definition['decimals']);
        $currency->setSymbol($definition['symbol']);

        return $currency;
    }
}
