<?php

namespace Meanify\LaravelHelpers\Utils;

class CountryUtil
{
    /**
     * @return mixed
     */
    public function getCountries()
    {
        $json = '[{"gentle":"afegãne","country_pt_br":"Afeganistão","country":"Afghanistan","acronym":"AF"},{"gentle":"sul-africana","country_pt_br":"África do Sul","country":"South Africa","acronym":"ZA"},{"gentle":"albanesa","country_pt_br":"Albânia","country":"Albania","acronym":"AL"},{"gentle":"alemã","country_pt_br":"Alemanha","country":"Germany","acronym":"DE"},{"gentle":"andorrana","country_pt_br":"Andorra","country":"Andorra","acronym":"AD"},{"gentle":"angolana","country_pt_br":"Angola","country":"Angola","acronym":"AO"},{"gentle":"anguillana","country_pt_br":"Anguilla","country":"Anguilla","acronym":"AI"},{"gentle":"de antártida","country_pt_br":"Antártida","country":"Antarctica","acronym":"AQ"},{"gentle":"antiguana","country_pt_br":"Antígua e Barbuda","country":"Antigua & Barbuda","acronym":"AG"},{"gentle":"saudita","country_pt_br":"Arábia Saudita","country":"Saudi Arabia","acronym":"SA"},{"gentle":"argelina","country_pt_br":"Argélia","country":"Algeria","acronym":"DZ"},{"gentle":"argentina","country_pt_br":"Argentina","country":"Argentina","acronym":"AR"},{"gentle":"armênia","country_pt_br":"Armênia","country":"Armenia","acronym":"AM"},{"gentle":"arubana","country_pt_br":"Aruba","country":"Aruba","acronym":"AW"},{"gentle":"australiana","country_pt_br":"Austrália","country":"Australia","acronym":"AU"},{"gentle":"austríaca","country_pt_br":"Áustria","country":"Austria","acronym":"AT"},{"gentle":"azerbaijano","country_pt_br":"Azerbaijão","country":"Azerbaijan","acronym":"AZ"},{"gentle":"bahamense","country_pt_br":"Bahamas","country":"Bahamas","acronym":"BS"},{"gentle":"barenita","country_pt_br":"Bahrein","country":"Bahrain","acronym":"BH"},{"gentle":"bengali","country_pt_br":"Bangladesh","country":"Bangladesh","acronym":"BD"},{"gentle":"barbadiana","country_pt_br":"Barbados","country":"Barbados","acronym":"BB"},{"gentle":"bielo-russa","country_pt_br":"Belarus","country":"Belarus","acronym":"BY"},{"gentle":"belga","country_pt_br":"Bélgica","country":"Belgium","acronym":"BE"},{"gentle":"belizenha","country_pt_br":"Belize","country":"Belize","acronym":"BZ"},{"gentle":"beninense","country_pt_br":"Benin","country":"Benin","acronym":"BJ"},{"gentle":"bermudiana","country_pt_br":"Bermudas","country":"Bermuda","acronym":"BM"},{"gentle":"boliviana","country_pt_br":"Bolívia","country":"Bolivia","acronym":"BO"},{"gentle":"bósnia","country_pt_br":"Bósnia-Herzegóvina","country":"Bosnia & Herzegovina","acronym":"BA"},{"gentle":"betchuana","country_pt_br":"Botsuana","country":"Botswana","acronym":"BW"},{"gentle":"brasileira","country_pt_br":"Brasil","country":"Brazil","acronym":"BR"},{"gentle":"bruneiana","country_pt_br":"Brunei","country":"Brunei","acronym":"BN"},{"gentle":"búlgara","country_pt_br":"Bulgária","country":"Bulgaria","acronym":"BG"},{"gentle":"burquinês","country_pt_br":"Burkina Fasso","country":"Burkina Faso","acronym":"BF"},{"gentle":"burundinesa","country_pt_br":"Burundi","country":"Burundi","acronym":"BI"},{"gentle":"butanesa","country_pt_br":"Butão","country":"Bhutan","acronym":"BT"},{"gentle":"cabo-verdiana","country_pt_br":"Cabo Verde","country":"Cape Verde","acronym":"CV"},{"gentle":"camaronesa","country_pt_br":"Camarões","country":"Cameroon","acronym":"CM"},{"gentle":"cambojana","country_pt_br":"Camboja","country":"Cambodia","acronym":"KH"},{"gentle":"canadense","country_pt_br":"Canadá","country":"Canada","acronym":"CA"},{"gentle":"canário","country_pt_br":"Canárias","country":"Canary Islands","acronym":"IC"},{"gentle":"cazaque","country_pt_br":"Cazaquistão","country":"Kazakhstan","acronym":"KZ"},{"gentle":"de ceuta e melilla","country_pt_br":"Ceuta e Melilla","country":"Ceuta & Melilla","acronym":"EA"},{"gentle":"chadiana","country_pt_br":"Chade","country":"Chad","acronym":"TD"},{"gentle":"chilena","country_pt_br":"Chile","country":"Chile","acronym":"CL"},{"gentle":"chinesa","country_pt_br":"China","country":"China","acronym":"CN"},{"gentle":"cipriota","country_pt_br":"Chipre","country":"Cyprus","acronym":"CY"},{"gentle":"cingapuriana","country_pt_br":"Cingapura","country":"Singapore","acronym":"SG"},{"gentle":"colombiana","country_pt_br":"Colômbia","country":"Colombia","acronym":"CO"},{"gentle":"comorense","country_pt_br":"Comores","country":"Comoros","acronym":"KM"},{"gentle":"congolesa","country_pt_br":"Congo","country":"Republic of the Congo","acronym":"CG"},{"gentle":"norte-coreano","country_pt_br":"Coréia do Norte","country":"North Korea","acronym":"KP"},{"gentle":"norte-coreana","country_pt_br":"Coréia do Sul","country":"South Korea","acronym":"KR"},{"gentle":"marfinense","country_pt_br":"Costa do Marfim","country":"Ivory Coast","acronym":"CI"},{"gentle":"costarriquenha","country_pt_br":"Costa Rica","country":"Costa Rica","acronym":"CR"},{"gentle":"croata","country_pt_br":"Croácia","country":"Croatia","acronym":"HR"},{"gentle":"cubana","country_pt_br":"Cuba","country":"Cuba","acronym":"CU"},{"gentle":"curaçauense","country_pt_br":"Curaçao","country":"Curaçao","acronym":"CW"},{"gentle":"chagositano","country_pt_br":"Diego Garcia","country":"Diego Garcia","acronym":"DG"},{"gentle":"dinamarquesa","country_pt_br":"Dinamarca","country":"Denmark","acronym":"DK"},{"gentle":"djibutiana","country_pt_br":"Djibuti","country":"Djibouti","acronym":"DJ"},{"gentle":"dominiquense","country_pt_br":"Dominica","country":"Dominica","acronym":"DM"},{"gentle":"egípcia","country_pt_br":"Egito","country":"Egypt","acronym":"EG"},{"gentle":"salvadorenha","country_pt_br":"El Salvador","country":"El Salvador","acronym":"SV"},{"gentle":"árabe","country_pt_br":"Emirados Árabes Unidos","country":"United Arab Emirates","acronym":"AE"},{"gentle":"equatoriana","country_pt_br":"Equador","country":"Ecuador","acronym":"EC"},{"gentle":"eritreia","country_pt_br":"Eritréia","country":"Eritrea","acronym":"ER"},{"gentle":"eslovaco","country_pt_br":"Eslováquia","country":"Slovakia","acronym":"SK"},{"gentle":"esloveno","country_pt_br":"Eslovênia","country":"Slovenia","acronym":"SI"},{"gentle":"espanhola","country_pt_br":"Espanha","country":"Spain","acronym":"ES"},{"gentle":"norte-americana","country_pt_br":"Estados Unidos","country":"United States","acronym":"US"},{"gentle":"estoniana","country_pt_br":"Estônia","country":"Estonia","acronym":"EE"},{"gentle":"etíope","country_pt_br":"Etiópia","country":"Ethiopia","acronym":"ET"},{"gentle":"fijiana","country_pt_br":"Fiji","country":"Fiji","acronym":"FJ"},{"gentle":"filipina","country_pt_br":"Filipinas","country":"Philippines","acronym":"PH"},{"gentle":"finlandesa","country_pt_br":"Finlândia","country":"Finland","acronym":"FI"},{"gentle":"francesa","country_pt_br":"França","country":"France","acronym":"FR"},{"gentle":"gabonesa","country_pt_br":"Gabão","country":"Gabon","acronym":"GA"},{"gentle":"gambiana","country_pt_br":"Gâmbia","country":"Gambia","acronym":"GM"},{"gentle":"ganense","country_pt_br":"Gana","country":"Ghana","acronym":"GH"},{"gentle":"georgiana","country_pt_br":"Geórgia","country":"Georgia","acronym":"GE"},{"gentle":"gibraltariana","country_pt_br":"Gibraltar","country":"Gibraltar","acronym":"GI"},{"gentle":"inglesa","country_pt_br":"Grã-Bretanha (Reino Unido, UK)","country":"United Kingdom","acronym":"GB"},{"gentle":"granadina","country_pt_br":"Granada","country":"Grenada","acronym":"GD"},{"gentle":"grega","country_pt_br":"Grécia","country":"Greece","acronym":"GR"},{"gentle":"groenlandesa","country_pt_br":"Groelândia","country":"Greenland","acronym":"GL"},{"gentle":"guadalupense","country_pt_br":"Guadalupe","country":"Guadeloupe","acronym":"GP"},{"gentle":"guamês","country_pt_br":"Guam (Território dos Estados Unidos)","country":"Guam","acronym":"GU"},{"gentle":"guatemalteca","country_pt_br":"Guatemala","country":"Guatemala","acronym":"GT"},{"gentle":"guernesiano","country_pt_br":"Guernsey","country":"Guernsey","acronym":"GG"},{"gentle":"guianense","country_pt_br":"Guiana","country":"Guyana","acronym":"GY"},{"gentle":"franco-guianense","country_pt_br":"Guiana Francesa","country":"French Guiana","acronym":"GF"},{"gentle":"guinéu-equatoriano ou equatoguineana","country_pt_br":"Guiné","country":"Guinea","acronym":"GN"},{"gentle":"guinéu-equatoriano","country_pt_br":"Guiné Equatorial","country":"Equatorial Guinea","acronym":"GQ"},{"gentle":"guineense","country_pt_br":"Guiné-Bissau","country":"Guinea-Bissau","acronym":"GW"},{"gentle":"haitiana","country_pt_br":"Haiti","country":"Haiti","acronym":"HT"},{"gentle":"holandês","country_pt_br":"Holanda","country":"Netherlands","acronym":"NL"},{"gentle":"hondurenha","country_pt_br":"Honduras","country":"Honduras","acronym":"HN"},{"gentle":"hong-konguiana ou chinesa","country_pt_br":"Hong Kong","country":"Hong Kong","acronym":"HK"},{"gentle":"húngara","country_pt_br":"Hungria","country":"Hungary","acronym":"HU"},{"gentle":"iemenita","country_pt_br":"Iêmen","country":"Yemen","acronym":"YE"},{"gentle":"da ilha bouvet","country_pt_br":"Ilha Bouvet","country":"Bouvet Island","acronym":"BV"},{"gentle":"da ilha de ascensão","country_pt_br":"Ilha de Ascensão","country":"Ascension Island","acronym":"AC"},{"gentle":"da ilha de clipperton","country_pt_br":"Ilha de Clipperton","country":"Clipperton Island","acronym":"CP"},{"gentle":"manês","country_pt_br":"Ilha de Man","country":"Isle of Man","acronym":"IM"},{"gentle":"natalense","country_pt_br":"Ilha Natal","country":"Christmas Island","acronym":"CX"},{"gentle":"pitcairnense","country_pt_br":"Ilha Pitcairn","country":"Pitcairn Islands","acronym":"PN"},{"gentle":"reunionense","country_pt_br":"Ilha Reunião","country":"Réunion","acronym":"RE"},{"gentle":"alandês","country_pt_br":"Ilhas Aland","country":"Åland Islands","acronym":"AX"},{"gentle":"caimanês","country_pt_br":"Ilhas Cayman","country":"Cayman Islands","acronym":"KY"},{"gentle":"coquense","country_pt_br":"Ilhas Cocos","country":"Cocos (Keeling) Islands","acronym":"CC"},{"gentle":"cookense","country_pt_br":"Ilhas Cook","country":"Cook Islands","acronym":"CK"},{"gentle":"faroense","country_pt_br":"Ilhas Faroes","country":"Faroe Islands","acronym":"FO"},{"gentle":"das ilhas geórgia do sul e sandwich do sul","country_pt_br":"Ilhas Geórgia do Sul e Sandwich do Sul","country":"South Georgia & South Sandwich Islands","acronym":"GS"},{"gentle":"das ilhas heard e mcdonald","country_pt_br":"Ilhas Heard e McDonald (Território da Austrália)","country":"Heard & McDonald Islands","acronym":"HM"},{"gentle":"malvinense","country_pt_br":"Ilhas Malvinas","country":"Falkland Islands (Islas Malvinas)","acronym":"FK"},{"gentle":"norte-marianense","country_pt_br":"Ilhas Marianas do Norte","country":"Northern Mariana Islands","acronym":"MP"},{"gentle":"marshallino","country_pt_br":"Ilhas Marshall","country":"Marshall Islands","acronym":"MH"},{"gentle":"das ilhas menores afastadas","country_pt_br":"Ilhas Menores dos Estados Unidos","country":"U.S. Outlying Islands","acronym":"UM"},{"gentle":"norfolquino","country_pt_br":"Ilhas Norfolk","country":"Norfolk Island","acronym":"NF"},{"gentle":"salomônico","country_pt_br":"Ilhas Salomão","country":"Solomon Islands","acronym":"SB"},{"gentle":"seichelense","country_pt_br":"Ilhas Seychelles","country":"Seychelles","acronym":"SC"},{"gentle":"toquelauano","country_pt_br":"Ilhas Tokelau","country":"Tokelau","acronym":"TK"},{"gentle":"turquês","country_pt_br":"Ilhas Turks e Caicos","country":"Turks & Caicos Islands","acronym":"TC"},{"gentle":"virginense","country_pt_br":"Ilhas Virgens (Estados Unidos)","country":"U.S. Virgin Islands","acronym":"VI"},{"gentle":"virginense","country_pt_br":"Ilhas Virgens (Inglaterra)","country":"British Virgin Islands","acronym":"VG"},{"gentle":"indiano","country_pt_br":"Índia","country":"India","acronym":"IN"},{"gentle":"indonésia","country_pt_br":"Indonésia","country":"Indonesia","acronym":"ID"},{"gentle":"iraniano","country_pt_br":"Irã","country":"Iran","acronym":"IR"},{"gentle":"iraquiana","country_pt_br":"Iraque","country":"Iraq","acronym":"IQ"},{"gentle":"irlandesa","country_pt_br":"Irlanda","country":"Ireland","acronym":"IE"},{"gentle":"islandesa","country_pt_br":"Islândia","country":"Iceland","acronym":"IS"},{"gentle":"israelense","country_pt_br":"Israel","country":"Israel","acronym":"IL"},{"gentle":"italiana","country_pt_br":"Itália","country":"Italy","acronym":"IT"},{"gentle":"jamaicana","country_pt_br":"Jamaica","country":"Jamaica","acronym":"JM"},{"gentle":"japonesa","country_pt_br":"Japão","country":"Japan","acronym":"JP"},{"gentle":"canalina","country_pt_br":"Jersey","country":"Jersey","acronym":"JE"},{"gentle":"jordaniana","country_pt_br":"Jordânia","country":"Jordan","acronym":"JO"},{"gentle":"kiribatiana","country_pt_br":"Kiribati","country":"Kiribati","acronym":"KI"},{"gentle":"kosovar","country_pt_br":"Kosovo","country":"Kosovo","acronym":"XK"},{"gentle":"kuwaitiano","country_pt_br":"Kuait","country":"Kuwait","acronym":"KW"},{"gentle":"laosiana","country_pt_br":"Laos","country":"Laos","acronym":"LA"},{"gentle":"lesota","country_pt_br":"Lesoto","country":"Lesotho","acronym":"LS"},{"gentle":"letão","country_pt_br":"Letônia","country":"Latvia","acronym":"LV"},{"gentle":"libanesa","country_pt_br":"Líbano","country":"Lebanon","acronym":"LB"},{"gentle":"liberiana","country_pt_br":"Libéria","country":"Liberia","acronym":"LR"},{"gentle":"líbia","country_pt_br":"Líbia","country":"Libya","acronym":"LY"},{"gentle":"liechtensteiniense","country_pt_br":"Liechtenstein","country":"Liechtenstein","acronym":"LI"},{"gentle":"lituana","country_pt_br":"Lituânia","country":"Lithuania","acronym":"LT"},{"gentle":"luxemburguesa","country_pt_br":"Luxemburgo","country":"Luxembourg","acronym":"LU"},{"gentle":"macauense","country_pt_br":"Macau","country":"Macau","acronym":"MO"},{"gentle":"macedônio","country_pt_br":"Macedônia (República Yugoslava)","country":"Macedonia (FYROM)","acronym":"MK"},{"gentle":"malgaxe","country_pt_br":"Madagascar","country":"Madagascar","acronym":"MG"},{"gentle":"malaia","country_pt_br":"Malásia","country":"Malaysia","acronym":"MY"},{"gentle":"malauiano","country_pt_br":"Malaui","country":"Malawi","acronym":"MW"},{"gentle":"maldívia","country_pt_br":"Maldivas","country":"Maldives","acronym":"MV"},{"gentle":"malinesa","country_pt_br":"Mali","country":"Mali","acronym":"ML"},{"gentle":"maltesa","country_pt_br":"Malta","country":"Malta","acronym":"MT"},{"gentle":"marroquina","country_pt_br":"Marrocos","country":"Morocco","acronym":"MA"},{"gentle":"martiniquense","country_pt_br":"Martinica","country":"Martinique","acronym":"MQ"},{"gentle":"mauriciana","country_pt_br":"Maurício","country":"Mauritius","acronym":"MU"},{"gentle":"mauritana","country_pt_br":"Mauritânia","country":"Mauritania","acronym":"MR"},{"gentle":"maiotense","country_pt_br":"Mayotte","country":"Mayotte","acronym":"YT"},{"gentle":"mexicana","country_pt_br":"México","country":"Mexico","acronym":"MX"},{"gentle":"micronésia","country_pt_br":"Micronésia","country":"Micronesia","acronym":"FM"},{"gentle":"moçambicana","country_pt_br":"Moçambique","country":"Mozambique","acronym":"MZ"},{"gentle":"moldavo","country_pt_br":"Moldova","country":"Moldova","acronym":"MD"},{"gentle":"monegasca","country_pt_br":"Mônaco","country":"Monaco","acronym":"MC"},{"gentle":"mongol","country_pt_br":"Mongólia","country":"Mongolia","acronym":"MN"},{"gentle":"montenegra","country_pt_br":"Montenegro","country":"Montenegro","acronym":"ME"},{"gentle":"montserratiano","country_pt_br":"Montserrat","country":"Montserrat","acronym":"MS"},{"gentle":"birmanês","country_pt_br":"Myanma","country":"Myanmar (Burma)","acronym":"MM"},{"gentle":"namíbia","country_pt_br":"Namíbia","country":"Namibia","acronym":"NA"},{"gentle":"nauruana","country_pt_br":"Nauru","country":"Nauru","acronym":"NR"},{"gentle":"nepalesa","country_pt_br":"Nepal","country":"Nepal","acronym":"NP"},{"gentle":"nicaraguense","country_pt_br":"Nicarágua","country":"Nicaragua","acronym":"NI"},{"gentle":"nigerina","country_pt_br":"Níger","country":"Niger","acronym":"NE"},{"gentle":"nigeriana","country_pt_br":"Nigéria","country":"Nigeria","acronym":"NG"},{"gentle":"niueana","country_pt_br":"Niue","country":"Niue","acronym":"NU"},{"gentle":"norueguesa","country_pt_br":"Noruega","country":"Norway","acronym":"NO"},{"gentle":"caledônia","country_pt_br":"Nova Caledônia","country":"New Caledonia","acronym":"NC"},{"gentle":"neozelandesa","country_pt_br":"Nova Zelândia","country":"New Zealand","acronym":"NZ"},{"gentle":"omani","country_pt_br":"Omã","country":"Oman","acronym":"OM"},{"gentle":"dos países baixos caribenhos","country_pt_br":"Países Baixos Caribenhos","country":"Caribbean Netherlands","acronym":"BQ"},{"gentle":"palauense","country_pt_br":"Palau","country":"Palau","acronym":"PW"},{"gentle":"palestino","country_pt_br":"Palestina","country":"Palestine","acronym":"PS"},{"gentle":"zona do canal do panamá","country_pt_br":"Panamá","country":"Panama","acronym":"PA"},{"gentle":"pauásia","country_pt_br":"Papua-Nova Guiné","country":"Papua New Guinea","acronym":"PG"},{"gentle":"paquistanesa","country_pt_br":"Paquistão","country":"Pakistan","acronym":"PK"},{"gentle":"paraguaia","country_pt_br":"Paraguai","country":"Paraguay","acronym":"PY"},{"gentle":"peruana","country_pt_br":"Peru","country":"Peru","acronym":"PE"},{"gentle":"franco-polinésia","country_pt_br":"Polinésia Francesa","country":"French Polynesia","acronym":"PF"},{"gentle":"polonesa","country_pt_br":"Polônia","country":"Poland","acronym":"PL"},{"gentle":"portorriquenha","country_pt_br":"Porto Rico","country":"Puerto Rico","acronym":"PR"},{"gentle":"portuguesa","country_pt_br":"Portugal","country":"Portugal","acronym":"PT"},{"gentle":"catarense","country_pt_br":"Qatar","country":"Qatar","acronym":"QA"},{"gentle":"queniano","country_pt_br":"Quênia","country":"Kenya","acronym":"KE"},{"gentle":"quirguiz","country_pt_br":"Quirguistão","country":"Kyrgyzstan","acronym":"KG"},{"gentle":"centro-africana","country_pt_br":"República Centro-Africana","country":"Central African Republic","acronym":"CF"},{"gentle":"congolesa","country_pt_br":"República Democrática do Congo","country":"Democratic Republic of Congo","acronym":"CD"},{"gentle":"dominicana","country_pt_br":"República Dominicana","country":"Dominican Republic","acronym":"DO"},{"gentle":"tcheco","country_pt_br":"República Tcheca","country":"Czech Republic","acronym":"CZ"},{"gentle":"romena","country_pt_br":"Romênia","country":"Romania","acronym":"RO"},{"gentle":"ruandesa","country_pt_br":"Ruanda","country":"Rwanda","acronym":"RW"},{"gentle":"russa","country_pt_br":"Rússia (antiga URSS) - Federação Russa","country":"Russia","acronym":"RU"},{"gentle":"saariano","country_pt_br":"Saara Ocidental","country":"Western Sahara","acronym":"EH"},{"gentle":"pedro-miquelonense","country_pt_br":"Saint-Pierre e Miquelon","country":"St. Pierre & Miquelon","acronym":"PM"},{"gentle":"samoana","country_pt_br":"Samoa Americana","country":"American Samoa","acronym":"AS"},{"gentle":"samoano","country_pt_br":"Samoa Ocidental","country":"Samoa","acronym":"WS"},{"gentle":"samarinês","country_pt_br":"San Marino","country":"San Marino","acronym":"SM"},{"gentle":"helenense","country_pt_br":"Santa Helena","country":"St. Helena","acronym":"SH"},{"gentle":"santa-lucense","country_pt_br":"Santa Lúcia","country":"St. Lucia","acronym":"LC"},{"gentle":"são-bartolomeense","country_pt_br":"São Bartolomeu","country":"St. Barthélemy","acronym":"BL"},{"gentle":"são-cristovense","country_pt_br":"São Cristóvão e Névis","country":"St. Kitts & Nevis","acronym":"KN"},{"gentle":"são-martinhense","country_pt_br":"São Martim","country":"St. Martin","acronym":"MF"},{"gentle":"são-martinhense","country_pt_br":"São Martinho","country":"Sint Maarten","acronym":"SX"},{"gentle":"são-tomense","country_pt_br":"São Tomé e Príncipe","country":"São Tomé & Príncipe","acronym":"ST"},{"gentle":"sao-vicentino","country_pt_br":"São Vicente e Granadinas","country":"St. Vincent & Grenadines","acronym":"VC"},{"gentle":"senegalesa","country_pt_br":"Senegal","country":"Senegal","acronym":"SN"},{"gentle":"leonesa","country_pt_br":"Serra Leoa","country":"Sierra Leone","acronym":"SL"},{"gentle":"sérvia","country_pt_br":"Sérvia","country":"Serbia","acronym":"RS"},{"gentle":"síria","country_pt_br":"Síria","country":"Syria","acronym":"SY"},{"gentle":"somali","country_pt_br":"Somália","country":"Somalia","acronym":"SO"},{"gentle":"cingalesa","country_pt_br":"Sri Lanka","country":"Sri Lanka","acronym":"LK"},{"gentle":"suazi","country_pt_br":"Suazilândia","country":"Swaziland","acronym":"SZ"},{"gentle":"sudanesa","country_pt_br":"Sudão","country":"Sudan","acronym":"SD"},{"gentle":"sul-sudanês","country_pt_br":"Sudão do Sul","country":"South Sudan","acronym":"SS"},{"gentle":"sueca","country_pt_br":"Suécia","country":"Sweden","acronym":"SE"},{"gentle":"suíça","country_pt_br":"Suíça","country":"Switzerland","acronym":"CH"},{"gentle":"surinamesa","country_pt_br":"Suriname","country":"Suriname","acronym":"SR"},{"gentle":"svalbardense","country_pt_br":"Svalbard","country":"Svalbard & Jan Mayen","acronym":"SJ"},{"gentle":"tadjique","country_pt_br":"Tadjiquistão","country":"Tajikistan","acronym":"TJ"},{"gentle":"tailandesa","country_pt_br":"Tailândia","country":"Thailand","acronym":"TH"},{"gentle":"taiwanês","country_pt_br":"Taiwan","country":"Taiwan","acronym":"TW"},{"gentle":"tanzaniana","country_pt_br":"Tanzânia","country":"Tanzania","acronym":"TZ"},{"gentle":"do território britânico do oceano índico","country_pt_br":"Território Britânico do Oceano índico","country":"British Indian Ocean Territory","acronym":"IO"},{"gentle":"do territórios do sul da frança","country_pt_br":"Territórios do Sul da França","country":"French Southern Territories","acronym":"TF"},{"gentle":"timorense","country_pt_br":"Timor-Leste","country":"Timor-Leste","acronym":"TL"},{"gentle":"togolesa","country_pt_br":"Togo","country":"Togo","acronym":"TG"},{"gentle":"tonganesa","country_pt_br":"Tonga","country":"Tonga","acronym":"TO"},{"gentle":"trinitário-tobagense","country_pt_br":"Trinidad e Tobago","country":"Trinidad & Tobago","acronym":"TT"},{"gentle":"tristanita","country_pt_br":"Tristão da Cunha","country":"Tristan da Cunha","acronym":"TA"},{"gentle":"tunisiana","country_pt_br":"Tunísia","country":"Tunisia","acronym":"TN"},{"gentle":"turcomana","country_pt_br":"Turcomenistão","country":"Turkmenistan","acronym":"TM"},{"gentle":"turca","country_pt_br":"Turquia","country":"Turkey","acronym":"TR"},{"gentle":"tuvaluana","country_pt_br":"Tuvalu","country":"Tuvalu","acronym":"TV"},{"gentle":"ucraniana","country_pt_br":"Ucrânia","country":"Ukraine","acronym":"UA"},{"gentle":"ugandense","country_pt_br":"Uganda","country":"Uganda","acronym":"UG"},{"gentle":"uruguaia","country_pt_br":"Uruguai","country":"Uruguay","acronym":"UY"},{"gentle":"uzbeque","country_pt_br":"Uzbequistão","country":"Uzbekistan","acronym":"UZ"},{"gentle":"vanuatuense","country_pt_br":"Vanuatu","country":"Vanuatu","acronym":"VU"},{"gentle":"vaticano","country_pt_br":"Vaticano","country":"Vatican City","acronym":"VA"},{"gentle":"venezuelana","country_pt_br":"Venezuela","country":"Venezuela","acronym":"VE"},{"gentle":"vietnamita","country_pt_br":"Vietnã","country":"Vietnam","acronym":"VN"},{"gentle":"wallis-futunense","country_pt_br":"Wallis e Futuna","country":"Wallis & Futuna","acronym":"WF"},{"gentle":"zambiana","country_pt_br":"Zâmbia","country":"Zambia","acronym":"ZM"},{"gentle":"zimbabuana","country_pt_br":"Zimbábue","country":"Zimbabwe","acronym":"ZW"}]';

        $countries = json_decode($json);

        return $countries;
    }

    /**
     * @param array $only
     * @param array $except
     * @param string $locale
     * @param bool $associative
     * @param array $top
     * @return array
     */
    public function getInISO3166Alpha2(
        array $only         = [],
        array $except       = [],
        string $locale      = 'pt_BR',
        bool $associative   = false,
        array $top          = []
    ): array
    {
        $countries = [
            ['code' => 'AF', 'en_US' => 'Afghanistan', 'pt_BR' => 'Afeganistão'],
            ['code' => 'AL', 'en_US' => 'Albania', 'pt_BR' => 'Albânia'],
            ['code' => 'DE', 'en_US' => 'Germany', 'pt_BR' => 'Alemanha'],
            ['code' => 'AD', 'en_US' => 'Andorra', 'pt_BR' => 'Andorra'],
            ['code' => 'AO', 'en_US' => 'Angola', 'pt_BR' => 'Angola'],
            ['code' => 'AI', 'en_US' => 'Anguilla', 'pt_BR' => 'Anguila'],
            ['code' => 'AQ', 'en_US' => 'Antarctica', 'pt_BR' => 'Antártida'],
            ['code' => 'AG', 'en_US' => 'Antigua & Barbuda', 'pt_BR' => 'Antígua e Barbuda'],
            ['code' => 'AR', 'en_US' => 'Argentina', 'pt_BR' => 'Argentina'],
            ['code' => 'DZ', 'en_US' => 'Algeria', 'pt_BR' => 'Argélia'],
            ['code' => 'AM', 'en_US' => 'Armenia', 'pt_BR' => 'Armênia'],
            ['code' => 'AW', 'en_US' => 'Aruba', 'pt_BR' => 'Aruba'],
            ['code' => 'SA', 'en_US' => 'Saudi Arabia', 'pt_BR' => 'Arábia Saudita'],
            ['code' => 'AU', 'en_US' => 'Australia', 'pt_BR' => 'Austrália'],
            ['code' => 'AZ', 'en_US' => 'Azerbaijan', 'pt_BR' => 'Azerbaijão'],
            ['code' => 'BS', 'en_US' => 'Bahamas', 'pt_BR' => 'Bahamas'],
            ['code' => 'BD', 'en_US' => 'Bangladesh', 'pt_BR' => 'Bangladesh'],
            ['code' => 'BB', 'en_US' => 'Barbados', 'pt_BR' => 'Barbados'],
            ['code' => 'BH', 'en_US' => 'Bahrain', 'pt_BR' => 'Barein'],
            ['code' => 'BZ', 'en_US' => 'Belize', 'pt_BR' => 'Belize'],
            ['code' => 'BJ', 'en_US' => 'Benin', 'pt_BR' => 'Benin'],
            ['code' => 'BM', 'en_US' => 'Bermuda', 'pt_BR' => 'Bermudas'],
            ['code' => 'BY', 'en_US' => 'Belarus', 'pt_BR' => 'Bielorrússia'],
            ['code' => 'BO', 'en_US' => 'Bolivia', 'pt_BR' => 'Bolívia'],
            ['code' => 'BW', 'en_US' => 'Botswana', 'pt_BR' => 'Botsuana'],
            ['code' => 'BR', 'en_US' => 'Brazil', 'pt_BR' => 'Brasil'],
            ['code' => 'BN', 'en_US' => 'Brunei', 'pt_BR' => 'Brunei'],
            ['code' => 'BG', 'en_US' => 'Bulgaria', 'pt_BR' => 'Bulgária'],
            ['code' => 'BF', 'en_US' => 'Burkina Faso', 'pt_BR' => 'Burquina Faso'],
            ['code' => 'BI', 'en_US' => 'Burundi', 'pt_BR' => 'Burundi'],
            ['code' => 'BT', 'en_US' => 'Bhutan', 'pt_BR' => 'Butão'],
            ['code' => 'BE', 'en_US' => 'Belgium', 'pt_BR' => 'Bélgica'],
            ['code' => 'BA', 'en_US' => 'Bosnia & Herzegovina', 'pt_BR' => 'Bósnia e Herzegovina'],
            ['code' => 'CV', 'en_US' => 'Cape Verde', 'pt_BR' => 'Cabo Verde'],
            ['code' => 'CM', 'en_US' => 'Cameroon', 'pt_BR' => 'Camarões'],
            ['code' => 'KH', 'en_US' => 'Cambodia', 'pt_BR' => 'Camboja'],
            ['code' => 'CA', 'en_US' => 'Canada', 'pt_BR' => 'Canadá'],
            ['code' => 'QA', 'en_US' => 'Qatar', 'pt_BR' => 'Catar'],
            ['code' => 'KZ', 'en_US' => 'Kazakhstan', 'pt_BR' => 'Cazaquistão'],
            ['code' => 'TD', 'en_US' => 'Chad', 'pt_BR' => 'Chade'],
            ['code' => 'CL', 'en_US' => 'Chile', 'pt_BR' => 'Chile'],
            ['code' => 'CN', 'en_US' => 'China', 'pt_BR' => 'China'],
            ['code' => 'CY', 'en_US' => 'Cyprus', 'pt_BR' => 'Chipre'],
            ['code' => 'VA', 'en_US' => 'Vatican City', 'pt_BR' => 'Cidade do Vaticano'],
            ['code' => 'CO', 'en_US' => 'Colombia', 'pt_BR' => 'Colômbia'],
            ['code' => 'KM', 'en_US' => 'Comoros', 'pt_BR' => 'Comores'],
            ['code' => 'CD', 'en_US' => 'Congo - Kinshasa', 'pt_BR' => 'Congo - Kinshasa'],
            ['code' => 'KP', 'en_US' => 'North Korea', 'pt_BR' => 'Coreia do Norte'],
            ['code' => 'KR', 'en_US' => 'South Korea', 'pt_BR' => 'Coreia do Sul'],
            ['code' => 'CR', 'en_US' => 'Costa Rica', 'pt_BR' => 'Costa Rica'],
            ['code' => 'CI', 'en_US' => 'Côte d’Ivoire', 'pt_BR' => 'Costa do Marfim'],
            ['code' => 'HR', 'en_US' => 'Croatia', 'pt_BR' => 'Croácia'],
            ['code' => 'CU', 'en_US' => 'Cuba', 'pt_BR' => 'Cuba'],
            ['code' => 'CW', 'en_US' => 'Curaçao', 'pt_BR' => 'Curaçao'],
            ['code' => 'DK', 'en_US' => 'Denmark', 'pt_BR' => 'Dinamarca'],
            ['code' => 'DJ', 'en_US' => 'Djibouti', 'pt_BR' => 'Djibuti'],
            ['code' => 'DM', 'en_US' => 'Dominica', 'pt_BR' => 'Dominica'],
            ['code' => 'EG', 'en_US' => 'Egypt', 'pt_BR' => 'Egito'],
            ['code' => 'SV', 'en_US' => 'El Salvador', 'pt_BR' => 'El Salvador'],
            ['code' => 'AE', 'en_US' => 'United Arab Emirates', 'pt_BR' => 'Emirados Árabes Unidos'],
            ['code' => 'EC', 'en_US' => 'Ecuador', 'pt_BR' => 'Equador'],
            ['code' => 'ER', 'en_US' => 'Eritrea', 'pt_BR' => 'Eritreia'],
            ['code' => 'SK', 'en_US' => 'Slovakia', 'pt_BR' => 'Eslováquia'],
            ['code' => 'SI', 'en_US' => 'Slovenia', 'pt_BR' => 'Eslovênia'],
            ['code' => 'ES', 'en_US' => 'Spain', 'pt_BR' => 'Espanha'],
            ['code' => 'SZ', 'en_US' => 'Eswatini', 'pt_BR' => 'Essuatíni'],
            ['code' => 'US', 'en_US' => 'United States', 'pt_BR' => 'Estados Unidos'],
            ['code' => 'EE', 'en_US' => 'Estonia', 'pt_BR' => 'Estônia'],
            ['code' => 'ET', 'en_US' => 'Ethiopia', 'pt_BR' => 'Etiópia'],
            ['code' => 'FJ', 'en_US' => 'Fiji', 'pt_BR' => 'Fiji'],
            ['code' => 'PH', 'en_US' => 'Philippines', 'pt_BR' => 'Filipinas'],
            ['code' => 'FI', 'en_US' => 'Finland', 'pt_BR' => 'Finlândia'],
            ['code' => 'FR', 'en_US' => 'France', 'pt_BR' => 'França'],
            ['code' => 'GA', 'en_US' => 'Gabon', 'pt_BR' => 'Gabão'],
            ['code' => 'GH', 'en_US' => 'Ghana', 'pt_BR' => 'Gana'],
            ['code' => 'GE', 'en_US' => 'Georgia', 'pt_BR' => 'Geórgia'],
            ['code' => 'GI', 'en_US' => 'Gibraltar', 'pt_BR' => 'Gibraltar'],
            ['code' => 'GD', 'en_US' => 'Grenada', 'pt_BR' => 'Granada'],
            ['code' => 'GL', 'en_US' => 'Greenland', 'pt_BR' => 'Groenlândia'],
            ['code' => 'GR', 'en_US' => 'Greece', 'pt_BR' => 'Grécia'],
            ['code' => 'GP', 'en_US' => 'Guadeloupe', 'pt_BR' => 'Guadalupe'],
            ['code' => 'GU', 'en_US' => 'Guam', 'pt_BR' => 'Guam'],
            ['code' => 'GT', 'en_US' => 'Guatemala', 'pt_BR' => 'Guatemala'],
            ['code' => 'GG', 'en_US' => 'Guernsey', 'pt_BR' => 'Guernsey'],
            ['code' => 'GY', 'en_US' => 'Guyana', 'pt_BR' => 'Guiana'],
            ['code' => 'GF', 'en_US' => 'French Guiana', 'pt_BR' => 'Guiana Francesa'],
            ['code' => 'GN', 'en_US' => 'Guinea', 'pt_BR' => 'Guiné'],
            ['code' => 'GQ', 'en_US' => 'Equatorial Guinea', 'pt_BR' => 'Guiné Equatorial'],
            ['code' => 'GW', 'en_US' => 'Guinea-Bissau', 'pt_BR' => 'Guiné-Bissau'],
            ['code' => 'GM', 'en_US' => 'Gambia', 'pt_BR' => 'Gâmbia'],
            ['code' => 'HT', 'en_US' => 'Haiti', 'pt_BR' => 'Haiti'],
            ['code' => 'HN', 'en_US' => 'Honduras', 'pt_BR' => 'Honduras'],
            ['code' => 'HK', 'en_US' => 'Hong Kong SAR China', 'pt_BR' => 'Hong Kong, RAE da China'],
            ['code' => 'HU', 'en_US' => 'Hungary', 'pt_BR' => 'Hungria'],
            ['code' => 'BV', 'en_US' => 'Bouvet Island', 'pt_BR' => 'Ilha Bouvet'],
            ['code' => 'CX', 'en_US' => 'Christmas Island', 'pt_BR' => 'Ilha Christmas'],
            ['code' => 'NF', 'en_US' => 'Norfolk Island', 'pt_BR' => 'Ilha Norfolk'],
            ['code' => 'IM', 'en_US' => 'Isle of Man', 'pt_BR' => 'Ilha de Man'],
            ['code' => 'AX', 'en_US' => 'Åland Islands', 'pt_BR' => 'Ilhas Aland'],
            ['code' => 'KY', 'en_US' => 'Cayman Islands', 'pt_BR' => 'Ilhas Cayman'],
            ['code' => 'CC', 'en_US' => 'Cocos (Keeling) Islands', 'pt_BR' => 'Ilhas Cocos (Keeling)'],
            ['code' => 'CK', 'en_US' => 'Cook Islands', 'pt_BR' => 'Ilhas Cook'],
            ['code' => 'FO', 'en_US' => 'Faroe Islands', 'pt_BR' => 'Ilhas Faroé'],
            ['code' => 'GS', 'en_US' => 'South Georgia & South Sandwich Islands', 'pt_BR' => 'Ilhas Geórgia do Sul e Sandwich do Sul'],
            ['code' => 'HM', 'en_US' => 'Heard & McDonald Islands', 'pt_BR' => 'Ilhas Heard e McDonald'],
            ['code' => 'FK', 'en_US' => 'Falkland Islands', 'pt_BR' => 'Ilhas Malvinas'],
            ['code' => 'MP', 'en_US' => 'Northern Mariana Islands', 'pt_BR' => 'Ilhas Marianas do Norte'],
            ['code' => 'MH', 'en_US' => 'Marshall Islands', 'pt_BR' => 'Ilhas Marshall'],
            ['code' => 'UM', 'en_US' => 'U.S. Outlying Islands', 'pt_BR' => 'Ilhas Menores Distantes dos EUA'],
            ['code' => 'PN', 'en_US' => 'Pitcairn Islands', 'pt_BR' => 'Ilhas Pitcairn'],
            ['code' => 'SB', 'en_US' => 'Solomon Islands', 'pt_BR' => 'Ilhas Salomão'],
            ['code' => 'TC', 'en_US' => 'Turks & Caicos Islands', 'pt_BR' => 'Ilhas Turcas e Caicos'],
            ['code' => 'VI', 'en_US' => 'U.S. Virgin Islands', 'pt_BR' => 'Ilhas Virgens Americanas'],
            ['code' => 'VG', 'en_US' => 'British Virgin Islands', 'pt_BR' => 'Ilhas Virgens Britânicas'],
            ['code' => 'ID', 'en_US' => 'Indonesia', 'pt_BR' => 'Indonésia'],
            ['code' => 'IQ', 'en_US' => 'Iraq', 'pt_BR' => 'Iraque'],
            ['code' => 'IE', 'en_US' => 'Ireland', 'pt_BR' => 'Irlanda'],
            ['code' => 'IR', 'en_US' => 'Iran', 'pt_BR' => 'Irã'],
            ['code' => 'IS', 'en_US' => 'Iceland', 'pt_BR' => 'Islândia'],
            ['code' => 'IL', 'en_US' => 'Israel', 'pt_BR' => 'Israel'],
            ['code' => 'IT', 'en_US' => 'Italy', 'pt_BR' => 'Itália'],
            ['code' => 'YE', 'en_US' => 'Yemen', 'pt_BR' => 'Iêmen'],
            ['code' => 'JM', 'en_US' => 'Jamaica', 'pt_BR' => 'Jamaica'],
            ['code' => 'JP', 'en_US' => 'Japan', 'pt_BR' => 'Japão'],
            ['code' => 'JE', 'en_US' => 'Jersey', 'pt_BR' => 'Jersey'],
            ['code' => 'JO', 'en_US' => 'Jordan', 'pt_BR' => 'Jordânia'],
            ['code' => 'KW', 'en_US' => 'Kuwait', 'pt_BR' => 'Kuwait'],
            ['code' => 'LA', 'en_US' => 'Laos', 'pt_BR' => 'Laos'],
            ['code' => 'LS', 'en_US' => 'Lesotho', 'pt_BR' => 'Lesoto'],
            ['code' => 'LV', 'en_US' => 'Latvia', 'pt_BR' => 'Letônia'],
            ['code' => 'LR', 'en_US' => 'Liberia', 'pt_BR' => 'Libéria'],
            ['code' => 'LI', 'en_US' => 'Liechtenstein', 'pt_BR' => 'Liechtenstein'],
            ['code' => 'LT', 'en_US' => 'Lithuania', 'pt_BR' => 'Lituânia'],
            ['code' => 'LU', 'en_US' => 'Luxembourg', 'pt_BR' => 'Luxemburgo'],
            ['code' => 'LB', 'en_US' => 'Lebanon', 'pt_BR' => 'Líbano'],
            ['code' => 'LY', 'en_US' => 'Libya', 'pt_BR' => 'Líbia'],
            ['code' => 'MO', 'en_US' => 'Macao SAR China', 'pt_BR' => 'Macau, RAE da China'],
            ['code' => 'MK', 'en_US' => 'North Macedonia', 'pt_BR' => 'Macedônia do Norte'],
            ['code' => 'MG', 'en_US' => 'Madagascar', 'pt_BR' => 'Madagascar'],
            ['code' => 'MW', 'en_US' => 'Malawi', 'pt_BR' => 'Malaui'],
            ['code' => 'MV', 'en_US' => 'Maldives', 'pt_BR' => 'Maldivas'],
            ['code' => 'ML', 'en_US' => 'Mali', 'pt_BR' => 'Mali'],
            ['code' => 'MT', 'en_US' => 'Malta', 'pt_BR' => 'Malta'],
            ['code' => 'MY', 'en_US' => 'Malaysia', 'pt_BR' => 'Malásia'],
            ['code' => 'MA', 'en_US' => 'Morocco', 'pt_BR' => 'Marrocos'],
            ['code' => 'MQ', 'en_US' => 'Martinique', 'pt_BR' => 'Martinica'],
            ['code' => 'MR', 'en_US' => 'Mauritania', 'pt_BR' => 'Mauritânia'],
            ['code' => 'MU', 'en_US' => 'Mauritius', 'pt_BR' => 'Maurício'],
            ['code' => 'YT', 'en_US' => 'Mayotte', 'pt_BR' => 'Mayotte'],
            ['code' => 'MM', 'en_US' => 'Myanmar (Burma)', 'pt_BR' => 'Mianmar (Birmânia)'],
            ['code' => 'FM', 'en_US' => 'Micronesia', 'pt_BR' => 'Micronésia'],
            ['code' => 'MD', 'en_US' => 'Moldova', 'pt_BR' => 'Moldávia'],
            ['code' => 'MN', 'en_US' => 'Mongolia', 'pt_BR' => 'Mongólia'],
            ['code' => 'ME', 'en_US' => 'Montenegro', 'pt_BR' => 'Montenegro'],
            ['code' => 'MS', 'en_US' => 'Montserrat', 'pt_BR' => 'Montserrat'],
            ['code' => 'MZ', 'en_US' => 'Mozambique', 'pt_BR' => 'Moçambique'],
            ['code' => 'MX', 'en_US' => 'Mexico', 'pt_BR' => 'México'],
            ['code' => 'MC', 'en_US' => 'Monaco', 'pt_BR' => 'Mônaco'],
            ['code' => 'NA', 'en_US' => 'Namibia', 'pt_BR' => 'Namíbia'],
            ['code' => 'NR', 'en_US' => 'Nauru', 'pt_BR' => 'Nauru'],
            ['code' => 'NP', 'en_US' => 'Nepal', 'pt_BR' => 'Nepal'],
            ['code' => 'NI', 'en_US' => 'Nicaragua', 'pt_BR' => 'Nicarágua'],
            ['code' => 'NG', 'en_US' => 'Nigeria', 'pt_BR' => 'Nigéria'],
            ['code' => 'NU', 'en_US' => 'Niue', 'pt_BR' => 'Niue'],
            ['code' => 'NO', 'en_US' => 'Norway', 'pt_BR' => 'Noruega'],
            ['code' => 'NC', 'en_US' => 'New Caledonia', 'pt_BR' => 'Nova Caledônia'],
            ['code' => 'NZ', 'en_US' => 'New Zealand', 'pt_BR' => 'Nova Zelândia'],
            ['code' => 'NE', 'en_US' => 'Niger', 'pt_BR' => 'Níger'],
            ['code' => 'OM', 'en_US' => 'Oman', 'pt_BR' => 'Omã'],
            ['code' => 'PW', 'en_US' => 'Palau', 'pt_BR' => 'Palau'],
            ['code' => 'PA', 'en_US' => 'Panama', 'pt_BR' => 'Panamá'],
            ['code' => 'PG', 'en_US' => 'Papua New Guinea', 'pt_BR' => 'Papua-Nova Guiné'],
            ['code' => 'PK', 'en_US' => 'Pakistan', 'pt_BR' => 'Paquistão'],
            ['code' => 'PY', 'en_US' => 'Paraguay', 'pt_BR' => 'Paraguai'],
            ['code' => 'NL', 'en_US' => 'Netherlands', 'pt_BR' => 'Países Baixos'],
            ['code' => 'BQ', 'en_US' => 'Caribbean Netherlands', 'pt_BR' => 'Países Baixos Caribenhos'],
            ['code' => 'PE', 'en_US' => 'Peru', 'pt_BR' => 'Peru'],
            ['code' => 'PF', 'en_US' => 'French Polynesia', 'pt_BR' => 'Polinésia Francesa'],
            ['code' => 'PL', 'en_US' => 'Poland', 'pt_BR' => 'Polônia'],
            ['code' => 'PR', 'en_US' => 'Puerto Rico', 'pt_BR' => 'Porto Rico'],
            ['code' => 'PT', 'en_US' => 'Portugal', 'pt_BR' => 'Portugal'],
            ['code' => 'KG', 'en_US' => 'Kyrgyzstan', 'pt_BR' => 'Quirguistão'],
            ['code' => 'KI', 'en_US' => 'Kiribati', 'pt_BR' => 'Quiribati'],
            ['code' => 'KE', 'en_US' => 'Kenya', 'pt_BR' => 'Quênia'],
            ['code' => 'GB', 'en_US' => 'United Kingdom', 'pt_BR' => 'Reino Unido'],
            ['code' => 'CF', 'en_US' => 'Central African Republic', 'pt_BR' => 'República Centro-Africana'],
            ['code' => 'DO', 'en_US' => 'Dominican Republic', 'pt_BR' => 'República Dominicana'],
            ['code' => 'CG', 'en_US' => 'Congo - Brazzaville', 'pt_BR' => 'República do Congo'],
            ['code' => 'RE', 'en_US' => 'Réunion', 'pt_BR' => 'Reunião'],
            ['code' => 'RO', 'en_US' => 'Romania', 'pt_BR' => 'Romênia'],
            ['code' => 'RW', 'en_US' => 'Rwanda', 'pt_BR' => 'Ruanda'],
            ['code' => 'RU', 'en_US' => 'Russia', 'pt_BR' => 'Rússia'],
            ['code' => 'EH', 'en_US' => 'Western Sahara', 'pt_BR' => 'Saara Ocidental'],
            ['code' => 'WS', 'en_US' => 'Samoa', 'pt_BR' => 'Samoa'],
            ['code' => 'AS', 'en_US' => 'American Samoa', 'pt_BR' => 'Samoa Americana'],
            ['code' => 'SM', 'en_US' => 'San Marino', 'pt_BR' => 'San Marino'],
            ['code' => 'SH', 'en_US' => 'St. Helena', 'pt_BR' => 'Santa Helena'],
            ['code' => 'LC', 'en_US' => 'St. Lucia', 'pt_BR' => 'Santa Lúcia'],
            ['code' => 'SC', 'en_US' => 'Seychelles', 'pt_BR' => 'Seicheles'],
            ['code' => 'SN', 'en_US' => 'Senegal', 'pt_BR' => 'Senegal'],
            ['code' => 'SL', 'en_US' => 'Sierra Leone', 'pt_BR' => 'Serra Leoa'],
            ['code' => 'SG', 'en_US' => 'Singapore', 'pt_BR' => 'Singapura'],
            ['code' => 'SX', 'en_US' => 'Sint Maarten', 'pt_BR' => 'Sint Maarten'],
            ['code' => 'SO', 'en_US' => 'Somalia', 'pt_BR' => 'Somália'],
            ['code' => 'LK', 'en_US' => 'Sri Lanka', 'pt_BR' => 'Sri Lanka'],
            ['code' => 'SD', 'en_US' => 'Sudan', 'pt_BR' => 'Sudão'],
            ['code' => 'SS', 'en_US' => 'South Sudan', 'pt_BR' => 'Sudão do Sul'],
            ['code' => 'SR', 'en_US' => 'Suriname', 'pt_BR' => 'Suriname'],
            ['code' => 'SE', 'en_US' => 'Sweden', 'pt_BR' => 'Suécia'],
            ['code' => 'CH', 'en_US' => 'Switzerland', 'pt_BR' => 'Suíça'],
            ['code' => 'SJ', 'en_US' => 'Svalbard & Jan Mayen', 'pt_BR' => 'Svalbard e Jan Mayen'],
            ['code' => 'BL', 'en_US' => 'St. Barthélemy', 'pt_BR' => 'São Bartolomeu'],
            ['code' => 'KN', 'en_US' => 'St. Kitts & Nevis', 'pt_BR' => 'São Cristóvão e Névis'],
            ['code' => 'MF', 'en_US' => 'St. Martin', 'pt_BR' => 'São Martinho'],
            ['code' => 'PM', 'en_US' => 'St. Pierre & Miquelon', 'pt_BR' => 'São Pedro e Miquelão'],
            ['code' => 'ST', 'en_US' => 'São Tomé & Príncipe', 'pt_BR' => 'São Tomé e Príncipe'],
            ['code' => 'VC', 'en_US' => 'St. Vincent & Grenadines', 'pt_BR' => 'São Vicente e Granadinas'],
            ['code' => 'RS', 'en_US' => 'Serbia', 'pt_BR' => 'Sérvia'],
            ['code' => 'SY', 'en_US' => 'Syria', 'pt_BR' => 'Síria'],
            ['code' => 'TJ', 'en_US' => 'Tajikistan', 'pt_BR' => 'Tadjiquistão'],
            ['code' => 'TH', 'en_US' => 'Thailand', 'pt_BR' => 'Tailândia'],
            ['code' => 'TW', 'en_US' => 'Taiwan', 'pt_BR' => 'Taiwan'],
            ['code' => 'TZ', 'en_US' => 'Tanzania', 'pt_BR' => 'Tanzânia'],
            ['code' => 'CZ', 'en_US' => 'Czechia', 'pt_BR' => 'Tchéquia'],
            ['code' => 'IO', 'en_US' => 'British Indian Ocean Territory', 'pt_BR' => 'Território Britânico do Oceano Índico'],
            ['code' => 'TF', 'en_US' => 'French Southern Territories', 'pt_BR' => 'Territórios Franceses do Sul'],
            ['code' => 'PS', 'en_US' => 'Palestinian Territories', 'pt_BR' => 'Territórios palestinos'],
            ['code' => 'TL', 'en_US' => 'Timor-Leste', 'pt_BR' => 'Timor-Leste'],
            ['code' => 'TG', 'en_US' => 'Togo', 'pt_BR' => 'Togo'],
            ['code' => 'TK', 'en_US' => 'Tokelau', 'pt_BR' => 'Tokelau'],
            ['code' => 'TO', 'en_US' => 'Tonga', 'pt_BR' => 'Tonga'],
            ['code' => 'TT', 'en_US' => 'Trinidad & Tobago', 'pt_BR' => 'Trinidad e Tobago'],
            ['code' => 'TN', 'en_US' => 'Tunisia', 'pt_BR' => 'Tunísia'],
            ['code' => 'TM', 'en_US' => 'Turkmenistan', 'pt_BR' => 'Turcomenistão'],
            ['code' => 'TR', 'en_US' => 'Türkiye', 'pt_BR' => 'Turquia'],
            ['code' => 'TV', 'en_US' => 'Tuvalu', 'pt_BR' => 'Tuvalu'],
            ['code' => 'UA', 'en_US' => 'Ukraine', 'pt_BR' => 'Ucrânia'],
            ['code' => 'UG', 'en_US' => 'Uganda', 'pt_BR' => 'Uganda'],
            ['code' => 'UY', 'en_US' => 'Uruguay', 'pt_BR' => 'Uruguai'],
            ['code' => 'UZ', 'en_US' => 'Uzbekistan', 'pt_BR' => 'Uzbequistão'],
            ['code' => 'VU', 'en_US' => 'Vanuatu', 'pt_BR' => 'Vanuatu'],
            ['code' => 'VE', 'en_US' => 'Venezuela', 'pt_BR' => 'Venezuela'],
            ['code' => 'VN', 'en_US' => 'Vietnam', 'pt_BR' => 'Vietnã'],
            ['code' => 'WF', 'en_US' => 'Wallis & Futuna', 'pt_BR' => 'Wallis e Futuna'],
            ['code' => 'ZW', 'en_US' => 'Zimbabwe', 'pt_BR' => 'Zimbábue'],
            ['code' => 'ZM', 'en_US' => 'Zambia', 'pt_BR' => 'Zâmbia'],
            ['code' => 'ZA', 'en_US' => 'South Africa', 'pt_BR' => 'África do Sul'],
            ['code' => 'AT', 'en_US' => 'Austria', 'pt_BR' => 'Áustria'],
            ['code' => 'IN', 'en_US' => 'India', 'pt_BR' => 'Índia'],
        ];

        $filtered = array_filter($countries, function ($country) use ($only, $except) {
            if (!empty($only) && !in_array($country['code'], $only)) {
                return false;
            }
            if (!empty($except) && in_array($country['code'], $except)) {
                return false;
            }
            return true;
        });

        $topList  = [];
        $restList = [];

        foreach ($filtered as $item) {
            if (in_array($item['code'], $top)) {
                $topList[] = $item;
            } else {
                $restList[] = $item;
            }
        }

        usort($restList, fn($a, $b) => strcmp($a[$locale] ?? '', $b[$locale] ?? ''));

        $finalList = array_merge($topList, $restList);

        if ($associative) {
            return collect($finalList)->mapWithKeys(fn($item) => [
                $item['code'] => $item[$locale] ?? $item['en_US']
            ])->toArray();
        }

        return array_values($finalList);
    }

    /**
     * @return array
     */
    public function sortCountries($countries, $first_country_key, $first_country_value)
    {
        $sorted = [];

        foreach ($countries as $country)
        {
            if ($country->{$first_country_key} == $first_country_value)
            {
                $sorted[] = $country;
            }
        }

        foreach ($countries as $country)
        {
            if ($country->{$first_country_key} != $first_country_value)
            {
                $sorted[] = $country;
            }
        }

        return $sorted;
    }

    /**
     * @return array
     */
    public function getCountriesWithNameAsKey($lang = 'br')
    {
        $items = self::getCountries();

        $countries = [];

        foreach ($items as $item)
        {
            $countries[$lang == 'br' ? $item->country_pt_br : $item->country] = $item;
        }

        return $countries;
    }

    /**
     * @return array
     */
    public function getCountriesWithCodeAsKey()
    {
        $items = self::getCountries();

        $countries = [];

        foreach ($items as $item)
        {
            $countries[strtolower($item->acronym)] = $item;
        }

        return $countries;
    }

    /**
     * @return array|int[]|string[]
     */
    public function getBrazilianStates($return_type = 'key')
    {
        $states = [
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'DF' => 'Distrito Federal',
            'ES' => 'Espírito Santo',
            'GO' => 'Goiás',
            'MA' => 'Maranhão',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do Sul',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins',
        ];

        if ($return_type == 'key')
        {
            return array_keys($states);
        } elseif ($return_type == 'value')
        {
            return array_values($states);
        } else
        {
            return $states;
        }
    }

    /**
     * @notes Get code of country, by name. Or get name of country by code
     *
     * @param  string  $key
     * @return false|int|string|null
     */
    public function countryInfoByKey($value, $key = 'code')
    {
        $result = null;

        $countries = [
            'BD' => 'Bangladesh',
            'BE' => 'Belgium',
            'BF' => 'Burkina Faso',
            'BG' => 'Bulgaria',
            'BA' => 'Bosnia and Herzegovina',
            'BB' => 'Barbados',
            'WF' => 'Wallis and Futuna',
            'BL' => 'Saint Barthelemy',
            'BM' => 'Bermuda',
            'BN' => 'Brunei',
            'BO' => 'Bolivia',
            'BH' => 'Bahrain',
            'BI' => 'Burundi',
            'BJ' => 'Benin',
            'BT' => 'Bhutan',
            'JM' => 'Jamaica',
            'BV' => 'Bouvet Island',
            'BW' => 'Botswana',
            'WS' => 'Samoa',
            'BQ' => 'Bonaire, Saint Eustatius and Saba ',
            'BR' => 'Brazil',
            'BS' => 'Bahamas',
            'JE' => 'Jersey',
            'BY' => 'Belarus',
            'BZ' => 'Belize',
            'RU' => 'Russia',
            'RW' => 'Rwanda',
            'RS' => 'Serbia',
            'TL' => 'East Timor',
            'RE' => 'Reunion',
            'TM' => 'Turkmenistan',
            'TJ' => 'Tajikistan',
            'RO' => 'Romania',
            'TK' => 'Tokelau',
            'GW' => 'Guinea-Bissau',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GS' => 'South Georgia and the South Sandwich Islands',
            'GR' => 'Greece',
            'GQ' => 'Equatorial Guinea',
            'GP' => 'Guadeloupe',
            'JP' => 'Japan',
            'GY' => 'Guyana',
            'GG' => 'Guernsey',
            'GF' => 'French Guiana',
            'GE' => 'Georgia',
            'GD' => 'Grenada',
            'GB' => 'United Kingdom',
            'GA' => 'Gabon',
            'SV' => 'El Salvador',
            'GN' => 'Guinea',
            'GM' => 'Gambia',
            'GL' => 'Greenland',
            'GI' => 'Gibraltar',
            'GH' => 'Ghana',
            'OM' => 'Oman',
            'TN' => 'Tunisia',
            'JO' => 'Jordan',
            'HR' => 'Croatia',
            'HT' => 'Haiti',
            'HU' => 'Hungary',
            'HK' => 'Hong Kong',
            'HN' => 'Honduras',
            'HM' => 'Heard Island and McDonald Islands',
            'VE' => 'Venezuela',
            'PR' => 'Puerto Rico',
            'PS' => 'Palestinian Territory',
            'PW' => 'Palau',
            'PT' => 'Portugal',
            'SJ' => 'Svalbard and Jan Mayen',
            'PY' => 'Paraguay',
            'IQ' => 'Iraq',
            'PA' => 'Panama',
            'PF' => 'French Polynesia',
            'PG' => 'Papua New Guinea',
            'PE' => 'Peru',
            'PK' => 'Pakistan',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn',
            'PL' => 'Poland',
            'PM' => 'Saint Pierre and Miquelon',
            'ZM' => 'Zambia',
            'EH' => 'Western Sahara',
            'EE' => 'Estonia',
            'EG' => 'Egypt',
            'ZA' => 'South Africa',
            'EC' => 'Ecuador',
            'IT' => 'Italy',
            'VN' => 'Vietnam',
            'SB' => 'Solomon Islands',
            'ET' => 'Ethiopia',
            'SO' => 'Somalia',
            'ZW' => 'Zimbabwe',
            'SA' => 'Saudi Arabia',
            'ES' => 'Spain',
            'ER' => 'Eritrea',
            'ME' => 'Montenegro',
            'MD' => 'Moldova',
            'MG' => 'Madagascar',
            'MF' => 'Saint Martin',
            'MA' => 'Morocco',
            'MC' => 'Monaco',
            'UZ' => 'Uzbekistan',
            'MM' => 'Myanmar',
            'ML' => 'Mali',
            'MO' => 'Macao',
            'MN' => 'Mongolia',
            'MH' => 'Marshall Islands',
            'MK' => 'Macedonia',
            'MU' => 'Mauritius',
            'MT' => 'Malta',
            'MW' => 'Malawi',
            'MV' => 'Maldives',
            'MQ' => 'Martinique',
            'MP' => 'Northern Mariana Islands',
            'MS' => 'Montserrat',
            'MR' => 'Mauritania',
            'IM' => 'Isle of Man',
            'UG' => 'Uganda',
            'TZ' => 'Tanzania',
            'MY' => 'Malaysia',
            'MX' => 'Mexico',
            'IL' => 'Israel',
            'FR' => 'France',
            'IO' => 'British Indian Ocean Territory',
            'SH' => 'Saint Helena',
            'FI' => 'Finland',
            'FJ' => 'Fiji',
            'FK' => 'Falkland Islands',
            'FM' => 'Micronesia',
            'FO' => 'Faroe Islands',
            'NI' => 'Nicaragua',
            'NL' => 'Netherlands',
            'NO' => 'Norway',
            'NA' => 'Namibia',
            'VU' => 'Vanuatu',
            'NC' => 'New Caledonia',
            'NE' => 'Niger',
            'NF' => 'Norfolk Island',
            'NG' => 'Nigeria',
            'NZ' => 'New Zealand',
            'NP' => 'Nepal',
            'NR' => 'Nauru',
            'NU' => 'Niue',
            'CK' => 'Cook Islands',
            'XK' => 'Kosovo',
            'CI' => 'Ivory Coast',
            'CH' => 'Switzerland',
            'CO' => 'Colombia',
            'CN' => 'China',
            'CM' => 'Cameroon',
            'CL' => 'Chile',
            'CC' => 'Cocos Islands',
            'CA' => 'Canada',
            'CG' => 'Republic of the Congo',
            'CF' => 'Central African Republic',
            'CD' => 'Democratic Republic of the Congo',
            'CZ' => 'Czech Republic',
            'CY' => 'Cyprus',
            'CX' => 'Christmas Island',
            'CR' => 'Costa Rica',
            'CW' => 'Curacao',
            'CV' => 'Cape Verde',
            'CU' => 'Cuba',
            'SZ' => 'Swaziland',
            'SY' => 'Syria',
            'SX' => 'Sint Maarten',
            'KG' => 'Kyrgyzstan',
            'KE' => 'Kenya',
            'SS' => 'South Sudan',
            'SR' => 'Suriname',
            'KI' => 'Kiribati',
            'KH' => 'Cambodia',
            'KN' => 'Saint Kitts and Nevis',
            'KM' => 'Comoros',
            'ST' => 'Sao Tome and Principe',
            'SK' => 'Slovakia',
            'KR' => 'South Korea',
            'SI' => 'Slovenia',
            'KP' => 'North Korea',
            'KW' => 'Kuwait',
            'SN' => 'Senegal',
            'SM' => 'San Marino',
            'SL' => 'Sierra Leone',
            'SC' => 'Seychelles',
            'KZ' => 'Kazakhstan',
            'KY' => 'Cayman Islands',
            'SG' => 'Singapore',
            'SE' => 'Sweden',
            'SD' => 'Sudan',
            'DO' => 'Dominican Republic',
            'DM' => 'Dominica',
            'DJ' => 'Djibouti',
            'DK' => 'Denmark',
            'VG' => 'British Virgin Islands',
            'DE' => 'Germany',
            'YE' => 'Yemen',
            'DZ' => 'Algeria',
            'US' => 'United States',
            'UY' => 'Uruguay',
            'YT' => 'Mayotte',
            'UM' => 'United States Minor Outlying Islands',
            'LB' => 'Lebanon',
            'LC' => 'Saint Lucia',
            'LA' => 'Laos',
            'TV' => 'Tuvalu',
            'TW' => 'Taiwan',
            'TT' => 'Trinidad and Tobago',
            'TR' => 'Turkey',
            'LK' => 'Sri Lanka',
            'LI' => 'Liechtenstein',
            'LV' => 'Latvia',
            'TO' => 'Tonga',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'LR' => 'Liberia',
            'LS' => 'Lesotho',
            'TH' => 'Thailand',
            'TF' => 'French Southern Territories',
            'TG' => 'Togo',
            'TD' => 'Chad',
            'TC' => 'Turks and Caicos Islands',
            'LY' => 'Libya',
            'VA' => 'Vatican',
            'VC' => 'Saint Vincent and the Grenadines',
            'AE' => 'United Arab Emirates',
            'AD' => 'Andorra',
            'AG' => 'Antigua and Barbuda',
            'AF' => 'Afghanistan',
            'AI' => 'Anguilla',
            'VI' => 'U.S. Virgin Islands',
            'IS' => 'Iceland',
            'IR' => 'Iran',
            'AM' => 'Armenia',
            'AL' => 'Albania',
            'AO' => 'Angola',
            'AQ' => 'Antarctica',
            'AS' => 'American Samoa',
            'AR' => 'Argentina',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AW' => 'Aruba',
            'IN' => 'India',
            'AX' => 'Aland Islands',
            'AZ' => 'Azerbaijan',
            'IE' => 'Ireland',
            'ID' => 'Indonesia',
            'UA' => 'Ukraine',
            'QA' => 'Qatar',
            'MZ' => 'Mozambique',
        ];

        try
        {
            if ($key == 'code')
            {
                if (array_key_exists($value, $countries))
                {
                    $result = $countries[$value];
                }
            } else
            {
                $result = array_search($value, $countries);
            }
        } catch (\Throwable $e)
        {

        }

        return $result;
    }
}
