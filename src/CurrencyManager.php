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
            'numeric_code' => '784',
            'symbol' => 'د.إ',
        ),
        'AFN' => array(
            'code' => 'AFN',
            'name' => 'Afghan Afghani',
            'numeric_code' => '971',
            'symbol' => 'Af',
            'decimals' => 0,
        ),
        'ALL' => array(
            'code' => 'ALL',
            'name' => 'Albanian Lek',
            'numeric_code' => '008',
            'symbol' => 'Lek',
        ),
        'AMD' => array(
            'code' => 'AMD',
            'name' => 'Armenian Dram',
            'numeric_code' => '051',
            'symbol' => 'Dram',
        ),
        'ANG' => array(
            'code' => 'ANG',
            'name' => 'Netherlands Antillean Guilder',
            'numeric_code' => '532',
            'symbol' => 'NAf.',
        ),
        'AOA' => array(
            'code' => 'AOA',
            'name' => 'Angolan Kwanza',
            'numeric_code' => '973',
            'symbol' => 'Kz',
        ),
        'ARS' => array(
            'code' => 'ARS',
            'name' => 'Argentine Peso',
            'numeric_code' => '032',
            'symbol' => 'AR$',
        ),
        'AUD' => array(
            'code' => 'AUD',
            'name' => 'Australian Dollar',
            'numeric_code' => '036',
            'symbol' => '$',
        ),
        'AWG' => array(
            'code' => 'AWG',
            'name' => 'Aruban Florin',
            'numeric_code' => '533',
            'symbol' => 'Afl.',
        ),
        'AZN' => array(
            'code' => 'AZN',
            'name' => 'Azerbaijanian Manat',
            'numeric_code' => '944',
            'symbol' => 'man.',
        ),
        'BAM' => array(
            'code' => 'BAM',
            'name' => 'Bosnia-Herzegovina Convertible Mark',
            'numeric_code' => '977',
            'symbol' => 'KM',
        ),
        'BBD' => array(
            'code' => 'BBD',
            'name' => 'Barbadian Dollar',
            'numeric_code' => '052',
            'symbol' => 'Bds$',
        ),
        'BDT' => array(
            'code' => 'BDT',
            'name' => 'Bangladeshi Taka',
            'numeric_code' => '050',
            'symbol' => 'Tk',
        ),
       'BGN' => array(
            'code' => 'BGN',
            'name' => 'Bulgarian lev',
            'numeric_code' => '975',
            'symbol' => 'лв',
        ),
        'BHD' => array(
            'code' => 'BHD',
            'name' => 'Bahraini Dinar',
            'numeric_code' => '048',
            'symbol' => 'BD',
            'decimals' => 3,
        ),
        'BIF' => array(
            'code' => 'BIF',
            'name' => 'Burundian Franc',
            'numeric_code' => '108',
            'symbol' => 'FBu',
            'decimals' => 0,
        ),
        'BMD' => array(
            'code' => 'BMD',
            'name' => 'Bermudan Dollar',
            'numeric_code' => '060',
            'symbol' => 'BD$',
        ),
        'BND' => array(
            'code' => 'BND',
            'name' => 'Brunei Dollar',
            'numeric_code' => '096',
            'symbol' => 'BN$',
        ),
        'BOB' => array(
            'code' => 'BOB',
            'name' => 'Bolivian Boliviano',
            'numeric_code' => '068',
            'symbol' => 'Bs',
        ),
        'BRL' => array(
            'code' => 'BRL',
            'name' => 'Brazilian Real',
            'numeric_code' => '986',
            'symbol' => 'R$',
        ),
        'BSD' => array(
            'code' => 'BSD',
            'name' => 'Bahamian Dollar',
            'numeric_code' => '044',
            'symbol' => 'BS$',
        ),
        'BTN' => array(
            'code' => 'BTN',
            'name' => 'Bhutanese Ngultrum',
            'numeric_code' => '064',
            'symbol' => 'Nu.',
        ),
        'BWP' => array(
            'code' => 'BWP',
            'name' => 'Botswanan Pula',
            'numeric_code' => '072',
            'symbol' => 'BWP',
        ),
        'BYR' => array(
            'code' => 'BYR',
            'name' => 'Belarusian ruble',
            'numeric_code' => '974',
            'symbol' => 'руб.',
            'decimals' => 0,
        ),
        'BZD' => array(
            'code' => 'BZD',
            'name' => 'Belize Dollar',
            'numeric_code' => '084',
            'symbol' => 'BZ$',
        ),
        'CAD' => array(
            'code' => 'CAD',
            'name' => 'Canadian Dollar',
            'numeric_code' => '124',
            'symbol' => 'CA$',
        ),
        'CDF' => array(
            'code' => 'CDF',
            'name' => 'Congolese Franc',
            'numeric_code' => '976',
            'symbol' => 'CDF',
        ),
        'CHF' => array(
            'code' => 'CHF',
            'name' => 'Swiss Franc',
            'numeric_code' => '756',
            'symbol' => 'Fr.',
        ),
        'CLP' => array(
            'code' => 'CLP',
            'name' => 'Chilean Peso',
            'numeric_code' => '152',
            'symbol' => 'CL$',
            'decimals' => 0,
        ),
        'CNY' => array(
            'code' => 'CNY',
            'name' => 'Chinese Yuan Renminbi',
            'numeric_code' => '156',
            'symbol' => '¥',
        ),
        'COP' => array(
            'code' => 'COP',
            'name' => 'Colombian Peso',
            'numeric_code' => '170',
            'symbol' => '$',
            'decimals' => 0,
        ),
        'CRC' => array(
            'code' => 'CRC',
            'name' => 'Costa Rican Colón',
            'numeric_code' => '188',
            'symbol' => '¢',
            'decimals' => 0,
        ),
        'CUC' => array(
            'code' => 'CUC',
            'name' => 'Cuban Convertible Peso',
            'numeric_code' => 931,
            'symbol' => 'CUC$',
        ),
        'CUP' => array(
            'code' => 'CUP',
            'name' => 'Cuban Peso',
            'numeric_code' => '192',
            'symbol' => 'CU$',
        ),
        'CVE' => array(
            'code' => 'CVE',
            'name' => 'Cape Verdean Escudo',
            'numeric_code' => '132',
            'symbol' => 'CV$',
        ),
        'CZK' => array(
            'code' => 'CZK',
            'name' => 'Czech Republic Koruna',
            'numeric_code' => '203',
            'symbol' => 'Kč',
        ),
        'DJF' => array(
            'code' => 'DJF',
            'name' => 'Djiboutian Franc',
            'numeric_code' => '262',
            'symbol' => 'Fdj',
            'decimals' => 0,
        ),
        'DKK' => array(
            'code' => 'DKK',
            'name' => 'Danish Krone',
            'numeric_code' => '208',
            'symbol' => 'kr.',
        ),
        'DOP' => array(
            'code' => 'DOP',
            'name' => 'Dominican Peso',
            'numeric_code' => '214',
            'symbol' => 'RD$',
        ),
        'DZD' => array(
            'code' => 'DZD',
            'name' => 'Algerian Dinar',
            'numeric_code' => '012',
            'symbol' => 'DA',
        ),
        'EEK' => array(
            'code' => 'EEK',
            'name' => 'Estonian Kroon',
            'numeric_code' => '233',
            'symbol' => 'Ekr',
        ),
        'EGP' => array(
            'code' => 'EGP',
            'name' => 'Egyptian Pound',
            'numeric_code' => '818',
            'symbol' => 'EG£',
        ),
        'ERN' => array(
            'code' => 'ERN',
            'name' => 'Eritrean Nakfa',
            'numeric_code' => '232',
            'symbol' => 'Nfk',
        ),
        'ETB' => array(
            'code' => 'ETB',
            'name' => 'Ethiopian Birr',
            'numeric_code' => '230',
            'symbol' => 'Br',
        ),
        'EUR' => array(
            'code' => 'EUR',
            'name' => 'Euro',
            'numeric_code' => '978',
            'symbol' => '€',
        ),
        'FJD' => array(
            'code' => 'FJD',
            'name' => 'Fijian Dollar',
            'numeric_code' => '242',
            'symbol' => 'FJ$',
        ),
        'FKP' => array(
            'code' => 'FKP',
            'name' => 'Falkland Islands Pound',
            'numeric_code' => '238',
            'symbol' => 'FK£',
        ),
        'GBP' => array(
            'code' => 'GBP',
            'name' => 'British Pound Sterling',
            'numeric_code' => '826',
            'symbol' => '£',
        ),
        'GEL' => array(
            'code' => 'GEL',
            'name' => 'Georgian Lari',
            'numeric_code' => '981',
            'symbol' => 'ლ',
        ),
        'GHS' => array(
            'code' => 'GHS',
            'name' => 'Ghanaian Cedi',
            'numeric_code' => '936',
            'symbol' => 'GH₵',
        ),
        'GIP' => array(
            'code' => 'GIP',
            'name' => 'Gibraltar Pound',
            'numeric_code' => '292',
            'symbol' => 'GI£',
        ),
        'GMD' => array(
            'code' => 'GMD',
            'name' => 'Gambian Dalasi',
            'numeric_code' => '270',
            'symbol' => 'GMD',
        ),
        'GNF' => array(
            'code' => 'GNF',
            'name' => 'Guinean Franc',
            'numeric_code' => '324',
            'symbol' => 'FG',
            'decimals' => 0,
        ),
        'GTQ' => array(
            'code' => 'GTQ',
            'name' => 'Guatemalan Quetzal',
            'numeric_code' => '320',
            'symbol' => 'GTQ',
        ),
        'GYD' => array(
            'code' => 'GYD',
            'name' => 'Guyanaese Dollar',
            'numeric_code' => '328',
            'symbol' => 'GY$',
            'decimals' => 0,
        ),
        'HKD' => array(
            'code' => 'HKD',
            'name' => 'Hong Kong Dollar',
            'numeric_code' => '344',
            'symbol' => 'HK$',
        ),
        'HNL' => array(
            'code' => 'HNL',
            'name' => 'Honduran Lempira',
            'numeric_code' => '340',
            'symbol' => 'HNL',
        ),
        'HRK' => array(
            'code' => 'HRK',
            'name' => 'Croatian Kuna',
            'numeric_code' => '191',
            'symbol' => 'kn',
        ),
        'HTG' => array(
            'code' => 'HTG',
            'name' => 'Haitian Gourde',
            'numeric_code' => '332',
            'symbol' => 'HTG',
        ),
        'HUF' => array(
            'code' => 'HUF',
            'name' => 'Hungarian Forint',
            'numeric_code' => '348',
            'symbol' => 'Ft',
            'decimals' => 0,
        ),
        'IDR' => array(
            'code' => 'IDR',
            'name' => 'Indonesian Rupiah',
            'numeric_code' => '360',
            'symbol' => 'Rp',
            'decimals' => 0,
        ),
        'ILS' => array(
            'code' => 'ILS',
            'name' => 'Israeli New Shekel',
            'numeric_code' => '376',
            'symbol' => '₪'
        ),
        'INR' => array(
            'code' => 'INR',
            'name' => 'Indian Rupee',
            'numeric_code' => '356',
            'symbol' => 'Rs',
        ),
        'IRR' => array(
            'code' => 'IRR',
            'name' => 'Iranian Rial',
            'numeric_code' => '364',
            'symbol' => '﷼',
        ),
        'ISK' => array(
            'code' => 'ISK',
            'name' => 'Icelandic Króna',
            'numeric_code' => '352',
            'symbol' => 'Ikr',
            'decimals' => 0,
        ),
        'JMD' => array(
            'code' => 'JMD',
            'name' => 'Jamaican Dollar',
            'numeric_code' => '388',
            'symbol' => 'J$',
        ),
        'JOD' => array(
            'code' => 'JOD',
            'name' => 'Jordanian Dinar',
            'numeric_code' => '400',
            'symbol' => 'JD',
            'decimals' => 3,
        ),
        'JPY' => array(
            'code' => 'JPY',
            'name' => 'Japanese Yen',
            'numeric_code' => '392',
            'symbol' => '¥',
            'decimals' => 0,
        ),
        'KES' => array(
            'code' => 'KES',
            'name' => 'Kenyan Shilling',
            'numeric_code' => '404',
            'symbol' => 'Ksh',
        ),
        'KGS' => array(
            'code' => 'KGS',
            'name' => 'Kyrgyzstani Som',
            'numeric_code' => '417',
            'symbol' => 'сом',
        ),
        'KMF' => array(
            'code' => 'KMF',
            'name' => 'Comorian Franc',
            'numeric_code' => '174',
            'symbol' => 'CF',
            'decimals' => 0,
        ),
        'KRW' => array(
            'code' => 'KRW',
            'name' => 'South Korean Won',
            'numeric_code' => '410',
            'symbol' => '₩',
            'decimals' => 0,
        ),
        'KWD' => array(
            'code' => 'KWD',
            'name' => 'Kuwaiti Dinar',
            'decimals' => 3,
            'numeric_code' => '414',
            'symbol' => 'KD',
        ),
        'KYD' => array(
            'code' => 'KYD',
            'name' => 'Cayman Islands Dollar',
            'numeric_code' => '136',
            'symbol' => 'KY$',
        ),
        'KZT' => array(
            'code' => 'KZT',
            'name' => 'Kazakhstani tenge',
            'numeric_code' => '398',
            'symbol' => 'тг.',
        ),
        'LAK' => array(
            'code' => 'LAK',
            'name' => 'Laotian Kip',
            'numeric_code' => '418',
            'symbol' => '₭N',
            'decimals' => 0,
        ),
        'LBP' => array(
            'code' => 'LBP',
            'name' => 'Lebanese Pound',
            'numeric_code' => '422',
            'symbol' => 'LB£',
            'decimals' => 0,
        ),
        'LKR' => array(
            'code' => 'LKR',
            'name' => 'Sri Lanka Rupee',
            'numeric_code' => '144',
            'symbol' => 'SLRs',
        ),
        'LRD' => array(
            'code' => 'LRD',
            'name' => 'Liberian Dollar',
            'numeric_code' => '430',
            'symbol' => 'L$',
        ),
        'LSL' => array(
            'code' => 'LSL',
            'name' => 'Lesotho Loti',
            'numeric_code' => '426',
            'symbol' => 'LSL',
        ),
        'LTL' => array(
            'code' => 'LTL',
            'name' => 'Lithuanian Litas',
            'numeric_code' => '440',
            'symbol' => 'Lt',
        ),
        'LVL' => array(
            'code' => 'LVL',
            'name' => 'Latvian Lats',
            'numeric_code' => '428',
            'symbol' => 'Ls',
        ),
        'LYD' => array(
            'code' => 'LYD',
            'name' => 'Libyan Dinar',
            'numeric_code' => '434',
            'symbol' => 'LD',
            'decimals' => 3,
        ),
        'MAD' => array(
            'code' => 'MAD',
            'name' => 'Moroccan Dirham',
            'numeric_code' => '504',
            'symbol' => 'Dhs',
        ),
        'MDL' => array(
            'code' => 'MDL',
            'name' => 'Moldovan leu',
            'numeric_code' => '498',
            'symbol' => 'MDL',
        ),
        'MGA' => array(
            'code' => 'MGA',
            'name' => 'Malagasy ariary',
            'numeric_code' => '969',
            'symbol' => 'Ar',
        ),
        'MKD' => array(
            'code' => 'MKD',
            'name' => 'Macedonian denar',
            'numeric_code' => '807',
            'symbol' => 'ден',
        ),
        'MMK' => array(
            'code' => 'MMK',
            'name' => 'Myanma Kyat',
            'numeric_code' => '104',
            'symbol' => 'MMK',
            'decimals' => 0,
        ),
        'MNT' => array(
            'code' => 'MNT',
            'name' => 'Mongolian Tugrik',
            'numeric_code' => '496',
            'symbol' => '₮',
            'decimals' => 0,
        ),
        'MOP' => array(
            'code' => 'MOP',
            'name' => 'Macanese Pataca',
            'numeric_code' => '446',
            'symbol' => 'MOP$',
        ),
        'MRO' => array(
            'code' => 'MRO',
            'name' => 'Mauritanian Ouguiya',
            'numeric_code' => '478',
            'symbol' => 'UM',
            'decimals' => 0,
        ),
        'MUR' => array(
            'code' => 'MUR',
            'name' => 'Mauritian Rupee',
            'numeric_code' => '480',
            'symbol' => 'MURs',
            'decimals' => 0,
        ),
        'MXN' => array(
            'code' => 'MXN',
            'name' => 'Mexican Peso',
            'numeric_code' => '484',
            'symbol' => '$',
        ),
        'MYR' => array(
            'code' => 'MYR',
            'name' => 'Malaysian Ringgit',
            'numeric_code' => '458',
            'symbol' => 'RM',
        ),
        'MZN' => array(
            'code' => 'MZN',
            'name' => 'Mozambican Metical',
            'numeric_code' => '943',
            'symbol' => 'MTn',
        ),
        'NAD' => array(
            'code' => 'NAD',
            'name' => 'Namibian Dollar',
            'numeric_code' => '516',
            'symbol' => 'N$',
        ),
        'NGN' => array(
            'code' => 'NGN',
            'name' => 'Nigerian Naira',
            'numeric_code' => '566',
            'symbol' => '₦',
        ),
        'NIO' => array(
            'code' => 'NIO',
            'name' => 'Nicaraguan Cordoba Oro',
            'numeric_code' => '558',
            'symbol' => 'C$',
        ),
        'NOK' => array(
            'code' => 'NOK',
            'name' => 'Norwegian Krone',
            'numeric_code' => '578',
            'symbol' => 'Nkr',
        ),
        'NPR' => array(
            'code' => 'NPR',
            'name' => 'Nepalese Rupee',
            'numeric_code' => '524',
            'symbol' => 'NPRs',
        ),
        'NZD' => array(
            'code' => 'NZD',
            'name' => 'New Zealand Dollar',
            'numeric_code' => '554',
            'symbol' => '$',
        ),
        'OMR' => array(
            'code' => 'OMR',
            'name' => 'Omani Rial',
            'numeric_code' => '512',
            'symbol' => 'ر.ع.',
            'decimals' => 3,
        ),
        'PAB' => array(
            'code' => 'PAB',
            'name' => 'Panamanian Balboa',
            'numeric_code' => '590',
            'symbol' => 'B/.',
        ),
        'PEN' => array(
            'code' => 'PEN',
            'name' => 'Peruvian Nuevo Sol',
            'numeric_code' => '604',
            'symbol' => 'S/.',
        ),
        'PGK' => array(
            'code' => 'PGK',
            'name' => 'Papua New Guinean Kina',
            'numeric_code' => '598',
            'symbol' => 'PGK',
        ),
        'PHP' => array(
            'code' => 'PHP',
            'name' => 'Philippine Peso',
            'numeric_code' => '608',
            'symbol' => '₱',
        ),
        'PKR' => array(
            'code' => 'PKR',
            'name' => 'Pakistani Rupee',
            'numeric_code' => '586',
            'symbol' => 'PKRs',
            'decimals' => 0,
        ),
        'PLN' => array(
            'code' => 'PLN',
            'name' => 'Polish Złoty',
            'numeric_code' => '985',
            'symbol' => 'zł',
        ),
        'PYG' => array(
            'code' => 'PYG',
            'name' => 'Paraguayan Guarani',
            'numeric_code' => '600',
            'symbol' => '₲',
            'decimals' => 0,
        ),
        'QAR' => array(
            'code' => 'QAR',
            'name' => 'Qatari Rial',
            'numeric_code' => '634',
            'symbol' => 'QR',
        ),
        'RON' => array(
            'code' => 'RON',
            'name' => 'Romanian Leu',
            'numeric_code' => '946',
            'symbol' => 'RON',
        ),
        'RSD' => array(
            'code' => 'RSD',
            'name' => 'Serbian Dinar',
            'numeric_code' => '941',
            'symbol' => 'din.',
            'decimals' => 0,
        ),
        'RUB' => array(
            'code' => 'RUB',
            'name' => 'Russian Ruble',
            'numeric_code' => '643',
            'symbol' => 'руб.',
        ),
        'SAR' => array(
            'code' => 'SAR',
            'name' => 'Saudi Riyal',
            'numeric_code' => '682',
            'symbol' => 'SR',
        ),
        'SBD' => array(
            'code' => 'SBD',
            'name' => 'Solomon Islands Dollar',
            'numeric_code' => '090',
            'symbol' => 'SI$',
        ),
        'SCR' => array(
            'code' => 'SCR',
            'name' => 'Seychellois Rupee',
            'numeric_code' => '690',
            'symbol' => 'SRe',
        ),
        'SDD' => array(
            'code' => 'SDD',
            'name' => 'Old Sudanese Dinar',
            'numeric_code' => '736',
            'symbol' => 'LSd',
        ),
        'SEK' => array(
            'code' => 'SEK',
            'name' => 'Swedish Krona',
            'numeric_code' => '752',
            'symbol' => 'kr',
        ),
        'SGD' => array(
            'code' => 'SGD',
            'name' => 'Singapore Dollar',
            'numeric_code' => '702',
            'symbol' => 'S$',
        ),
        'SHP' => array(
            'code' => 'SHP',
            'name' => 'Saint Helena Pound',
            'numeric_code' => '654',
            'symbol' => 'SH£',
        ),
        'SLL' => array(
            'code' => 'SLL',
            'name' => 'Sierra Leonean Leone',
            'numeric_code' => '694',
            'symbol' => 'Le',
            'decimals' => 0,
        ),
        'SOS' => array(
            'code' => 'SOS',
            'name' => 'Somali Shilling',
            'numeric_code' => '706',
            'symbol' => 'Ssh',
            'decimals' => 0,
        ),
        'SRD' => array(
            'code' => 'SRD',
            'name' => 'Surinamese Dollar',
            'numeric_code' => '968',
            'symbol' => 'SR$',
        ),
        'STD' => array(
            'code' => 'STD',
            'name' => 'São Tomé and Príncipe Dobra',
            'numeric_code' => '678',
            'symbol' => 'Db',
            'decimals' => 0,
        ),
        'SYP' => array(
            'code' => 'SYP',
            'name' => 'Syrian Pound',
            'numeric_code' => '760',
            'symbol' => 'SY£',
            'decimals' => 0,
        ),
        'SZL' => array(
            'code' => 'SZL',
            'name' => 'Swazi Lilangeni',
            'numeric_code' => '748',
            'symbol' => 'SZL',
        ),
        'THB' => array(
            'code' => 'THB',
            'name' => 'Thai Baht',
            'numeric_code' => '764',
            'symbol' => '฿',
        ),
        'TJS' => array(
            'code' => 'TJS',
            'name' => 'Tajikistani Somoni',
            'numeric_code' => '972',
            'symbol' => 'diram',
        ),
        'TMT' => array(
            'code' => 'TMT',
            'name' => 'Turkmenistan manat',
            'numeric_code' => '934',
            'symbol' => 'T',
        ),
        'TND' => array(
            'code' => 'TND',
            'name' => 'Tunisian Dinar',
            'numeric_code' => '788',
            'symbol' => 'DT',
            'decimals' => 3,
        ),
        'TOP' => array(
            'code' => 'TOP',
            'name' => 'Tongan Paʻanga',
            'numeric_code' => '776',
            'symbol' => 'T$',
        ),
        'TRY' => array(
            'code' => 'TRY',
            'name' => 'Turkish Lira',
            'numeric_code' => '949',
            'symbol' => 'TL',
        ),
        'TTD' => array(
            'code' => 'TTD',
            'name' => 'Trinidad and Tobago Dollar',
            'numeric_code' => '780',
            'symbol' => 'TT$',
        ),
        'TWD' => array(
            'code' => 'TWD',
            'name' => 'New Taiwan Dollar',
            'numeric_code' => '901',
            'symbol' => 'NT$',
        ),
        'TZS' => array(
            'code' => 'TZS',
            'name' => 'Tanzanian Shilling',
            'numeric_code' => '834',
            'symbol' => 'TSh',
            'decimals' => 0,
        ),
        'UAH' => array(
            'code' => 'UAH',
            'name' => 'Ukrainian Hryvnia',
            'numeric_code' => '980',
            'symbol' => 'грн.',
        ),
        'UGX' => array(
            'code' => 'UGX',
            'name' => 'Ugandan Shilling',
            'numeric_code' => '800',
            'symbol' => 'USh',
            'decimals' => 0,
        ),
        'USD' => array(
            'code' => 'USD',
            'name' => 'United States Dollar',
            'numeric_code' => '840',
            'symbol' => '$',
        ),
        'UYU' => array(
            'code' => 'UYU',
            'name' => 'Uruguayan Peso',
            'numeric_code' => '858',
            'symbol' => '$U',
        ),
        'VEF' => array(
            'code' => 'VEF',
            'name' => 'Venezuelan Bolívar Fuerte',
            'numeric_code' => '937',
            'symbol' => 'Bs.F.',
        ),
        'VND' => array(
            'code' => 'VND',
            'name' => 'Vietnamese Dong',
            'numeric_code' => '704',
            'symbol' => 'đ',
            'decimals' => 0,
        ),
        'VUV' => array(
            'code' => 'VUV',
            'name' => 'Vanuatu Vatu',
            'numeric_code' => '548',
            'symbol' => 'VT',
            'decimals' => 0,
        ),
        'WST' => array(
            'code' => 'WST',
            'name' => 'Samoan Tala',
            'numeric_code' => '882',
            'symbol' => 'WS$',
        ),
        'XAF' => array(
            'code' => 'XAF',
            'name' => 'CFA Franc BEAC',
            'numeric_code' => '950',
            'symbol' => 'FCFA',
            'decimals' => 0,
        ),
        'XCD' => array(
            'code' => 'XCD',
            'name' => 'East Caribbean Dollar',
            'numeric_code' => '951',
            'symbol' => 'EC$',
        ),
        'XOF' => array(
            'code' => 'XOF',
            'name' => 'CFA Franc BCEAO',
            'numeric_code' => '952',
            'symbol' => 'CFA',
            'decimals' => 0,
        ),
        'XPF' => array(
            'code' => 'XPF',
            'name' => 'CFP Franc',
            'numeric_code' => '953',
            'symbol' => 'CFPF',
            'decimals' => 0,
        ),
        'YER' => array(
            'code' => 'YER',
            'name' => 'Yemeni Rial',
            'numeric_code' => '886',
            'symbol' => 'YR',
            'decimals' => 0,
        ),
        'ZAR' => array(
            'code' => 'ZAR',
            'name' => 'South African Rand',
            'numeric_code' => '710',
            'symbol' => 'R',
        ),
        'ZMK' => array(
            'code' => 'ZMK',
            'name' => 'Zambian Kwacha',
            'numeric_code' => '894',
            'symbol' => 'ZK',
            'decimals' => 0,
        ),
    );

    /**
     * {@inheritdoc}
     */
    public function get($currencyCode) {
        if (!isset($this->definitions[$currencyCode])) {
            throw new UnknownCurrencyException($currencyCode);
        }

        return $this->createCurrencyFromDefinition($this->definitions[$currencyCode]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAll() {
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
        $currency->setCurrencyCode($definition['code']);
        $currency->setName($definition['name']);
        $currency->setNumericCode($definition['numeric_code']);
        $currency->setDecimals($definition['decimals']);
        $currency->setSymbol($definition['symbol']);

        return $currency;
    }
}
