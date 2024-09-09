<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Le seguenti righe di linguaggio contengono i messaggi di errore predefiniti utilizzati dalla
    | classe di validazione. Alcune di queste regole hanno versioni multiple come
    | le regole di dimensione. Sentiti libero di modificare ciascuno di questi messaggi qui.
    |
    */

    'accepted' => 'Il campo deve essere accettato.',
    'accepted_if' => 'Il campo deve essere accettato quando :other è :value.',
    'active_url' => 'Il campo deve essere un URL valido.',
    'after' => 'Il campo deve essere una data successiva a :date.',
    'after_or_equal' => 'Il campo deve essere una data successiva o uguale a :date.',
    'alpha' => 'Il campo può contenere solo lettere.',
    'alpha_dash' => 'Il campo può contenere solo lettere, numeri, trattini e underscore.',
    'alpha_num' => 'Il campo può contenere solo lettere e numeri.',
    'array' => 'Il campo deve essere un array.',
    'ascii' => 'Il campo può contenere solo caratteri alfanumerici e simboli a byte singolo.',
    'before' => 'Il campo deve essere una data precedente a :date.',
    'before_or_equal' => 'Il campo deve essere una data precedente o uguale a :date.',
    'between' => [
        'array' => 'Il campo deve avere tra :min e :max elementi.',
        'file' => 'Il campo deve essere tra :min e :max kilobyte.',
        'numeric' => 'Il campo deve essere tra :min e :max.',
        'string' => 'Il campo deve essere tra :min e :max caratteri.',
    ],
    'boolean' => 'Il campo deve essere vero o falso.',
    'can' => 'Il campo contiene un valore non autorizzato.',
    'confirmed' => 'La conferma del campo non corrisponde.',
    'current_password' => 'La password è errata.',
    'date' => 'Il campo deve essere una data valida.',
    'date_equals' => 'Il campo deve essere una data uguale a :date.',
    'date_format' => 'Il campo deve corrispondere al formato :format.',
    'decimal' => 'Il campo deve avere :decimal posizioni decimali.',
    'declined' => 'Il campo deve essere rifiutato.',
    'declined_if' => 'Il campo deve essere rifiutato quando :other è :value.',
    'different' => 'Il campo e :other devono essere diversi.',
    'digits' => 'Il campo deve essere di :digits cifre.',
    'digits_between' => 'Il campo deve essere tra :min e :max cifre.',
    'dimensions' => 'Il campo ha dimensioni dell\'immagine non valide.',
    'distinct' => 'Il campo ha un valore duplicato.',
    'doesnt_end_with' => 'Il campo non deve terminare con uno dei seguenti: :values.',
    'doesnt_start_with' => 'Il campo non deve iniziare con uno dei seguenti: :values.',
    'email' => 'Il campo deve essere un indirizzo email valido.',
    'ends_with' => 'Il campo deve terminare con uno dei seguenti: :values.',
    'enum' => 'Il selezionato non è valido.',
    'exists' => 'Il selezionato non è valido.',
    'extensions' => 'Il campo deve avere una delle seguenti estensioni: :values.',
    'file' => 'Il campo deve essere un file.',
    'filled' => 'Il campo deve avere un valore.',
    'gt' => [
        'array' => 'Il campo deve avere più di :value elementi.',
        'file' => 'Il campo deve essere maggiore di :value kilobyte.',
        'numeric' => 'Il campo deve essere maggiore di :value.',
        'string' => 'Il campo deve essere maggiore di :value caratteri.',
    ],
    'gte' => [
        'array' => 'Il campo deve avere :value elementi o più.',
        'file' => 'Il campo deve essere maggiore o uguale a :value kilobyte.',
        'numeric' => 'Il campo deve essere maggiore o uguale a :value.',
        'string' => 'Il campo deve essere maggiore o uguale a :value caratteri.',
    ],
    'hex_color' => 'Il campo deve essere un colore esadecimale valido.',
    'image' => 'Il campo deve essere un\'immagine.',
    'in' => 'Il selezionato non è valido.',
    'in_array' => 'Il campo deve esistere in :other.',
    'integer' => 'Il campo deve essere un numero intero.',
    'ip' => 'Il campo deve essere un indirizzo IP valido.',
    'ipv4' => 'Il campo deve essere un indirizzo IPv4 valido.',
    'ipv6' => 'Il campo deve essere un indirizzo IPv6 valido.',
    'json' => 'Il campo deve essere una stringa JSON valida.',
    'lowercase' => 'Il campo deve essere minuscolo.',
    'lt' => [
        'array' => 'Il campo deve avere meno di :value elementi.',
        'file' => 'Il campo deve essere minore di :value kilobyte.',
        'numeric' => 'Il campo deve essere minore di :value.',
        'string' => 'Il campo deve essere minore di :value caratteri.',
    ],
    'lte' => [
        'array' => 'Il campo non deve avere più di :value elementi.',
        'file' => 'Il campo deve essere minore o uguale a :value kilobyte.',
        'numeric' => 'Il campo deve essere minore o uguale a :value.',
        'string' => 'Il campo deve essere minore o uguale a :value caratteri.',
    ],
    'mac_address' => 'Il campo deve essere un indirizzo MAC valido.',
    'max' => [
        'array' => 'Il campo non deve avere più di :max elementi.',
        'file' => 'Il campo non deve essere maggiore di :max kilobyte.',
        'numeric' => 'Il campo non deve essere maggiore di :max.',
        'string' => 'Il campo non deve essere maggiore di :max caratteri.',
    ],
    'max_digits' => 'Il campo non deve avere più di :max cifre.',
    'mimes' => 'Il campo deve essere un file di tipo: :values.',
    'mimetypes' => 'Il campo deve essere un file di tipo: :values.',
    'min' => [
        'array' => 'Il campo deve avere almeno :min elementi.',
        'file' => 'Il campo deve essere almeno di :min kilobyte.',
        'numeric' => 'Il campo deve essere almeno :min.',
        'string' => 'Il campo deve essere almeno di :min caratteri.',
    ],
    'min_digits' => 'Il campo deve avere almeno :min cifre.',
    'missing' => 'Il campo deve essere mancante.',
    'missing_if' => 'Il campo deve essere mancante quando :other è :value.',
    'missing_unless' => 'Il campo deve essere mancante a meno che :other sia in :values.',
    'missing_with' => 'Il campo deve essere mancante quando :values è presente.',
    'missing_with_all' => 'Il campo deve essere mancante quando :values sono presenti.',
    'multiple_of' => 'Il campo deve essere un multiplo di :value.',
    'not_in' => 'Il selezionato non è valido.',
    'not_regex' => 'Il formato del campo non è valido.',
    'numeric' => 'Il campo deve essere un numero.',
    'password' => [
        'letters' => 'Il campo deve contenere almeno una lettera.',
        'mixed' => 'Il campo deve contenere almeno una lettera maiuscola e una minuscola.',
        'numbers' => 'Il campo deve contenere almeno un numero.',
        'symbols' => 'Il campo deve contenere almeno un simbolo.',
        'uncompromised' => 'Il fornito è apparso in una fuga di dati. Si prega di scegliere un altro.',
    ],
    'present' => 'Il campo deve essere presente.',
    'present_if' => 'Il campo deve essere presente quando :other è :value.',
    'present_unless' => 'Il campo deve essere presente a meno che :other non sia :value.',
    'present_with' => 'Il campo deve essere presente quando :values è presente.',
    'present_with_all' => 'Il campo deve essere presente quando :values sono presenti.',
    'prohibited' => 'Il campo è vietato.',
    'prohibited_if' => 'Il campo è vietato quando :other è :value.',
    'prohibited_unless' => 'Il campo è vietato a meno che :other sia in :values.',
    'prohibits' => 'Il campo vieta che :other sia presente.',
    'regex' => 'Il formato del campo non è valido.',
    'required' => 'Il campo è obbligatorio.',
    'required_array_keys' => 'Il campo deve contenere voci per: :values.',
    'required_if' => 'Il campo è obbligatorio quando :other è :value.',
    'required_if_accepted' => 'Il campo è obbligatorio quando :other è accettato.',
    'required_unless' => 'Il campo è obbligatorio a meno che :other non sia in :values.',
    'required_with' => 'Il campo è obbligatorio quando :values è presente.',
    'required_with_all' => 'Il campo è obbligatorio quando :values sono presenti.',
    'required_without' => 'Il campo è obbligatorio quando :values non è presente.',
    'required_without_all' => 'Il campo è obbligatorio quando nessuno di :values è presente.',
    'same' => 'Il campo deve corrispondere a :other.',
    'size' => [
        'array' => 'Il campo deve contenere :size elementi.',
        'file' => 'Il campo deve essere di :size kilobyte.',
        'numeric' => 'Il campo deve essere :size.',
        'string' => 'Il campo deve essere lungo :size caratteri.',
    ],
    'starts_with' => 'Il campo deve iniziare con uno dei seguenti: :values.',
    'string' => 'Il campo deve essere una stringa.',
    'timezone' => 'Il campo deve essere un fuso orario valido.',
    'unique' => 'Il campo è già stato preso.',
    'uploaded' => 'Il campo non è riuscito a caricare.',
    'uppercase' => 'Il campo deve essere in maiuscolo.',
    'url' => 'Il campo deve essere un URL valido.',
    'ulid' => 'Il campo deve essere un ULID valido.',
    'uuid' => 'Il campo deve essere un UUID valido.',
    
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
