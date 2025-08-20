<?php

namespace App\Helpers;

class CodiceFiscaleHelper
{
    public static function calcola($nome, $cognome, $sesso, $data, $comune)
    {
        $nome = strtoupper($nome);
        $cognome = strtoupper($cognome);
        $sesso = strtoupper($sesso);
        $comune = strtoupper($comune);
        $data = date_create($data);

        $cf = self::generaCognome($cognome)
            . self::generaNome($nome)
            . self::generaData($data, $sesso)
            . $comune;

        $cf .= self::calcolaControllo($cf);

        return $cf;
    }

    private static function generaCognome($cognome)
    {
        return self::estraiLettere($cognome);
    }

    private static function generaNome($nome)
    {
        $consonanti = preg_replace('/[AEIOU]/i', '', $nome);
        if (strlen($consonanti) >= 4) {
            return $consonanti[0] . $consonanti[2] . $consonanti[3];
        }
        return self::estraiLettere($nome);
    }

    private static function estraiLettere($stringa)
    {
        $consonanti = preg_replace('/[AEIOU]/i', '', $stringa);
        $vocali = preg_replace('/[^AEIOU]/i', '', $stringa);
        $risultato = $consonanti . $vocali . 'XXX';
        return substr($risultato, 0, 3);
    }

    private static function generaData($data, $sesso)
    {
        $mesi = ['A','B','C','D','E','H','L','M','P','R','S','T'];
        $anno = $data->format('y');
        $mese = $mesi[(int)$data->format('m') - 1];
        $giorno = (int)$data->format('d');
        if ($sesso === 'F') {
            $giorno += 40;
        }
        return $anno . $mese . str_pad($giorno, 2, '0', STR_PAD_LEFT);
    }

    private static function calcolaControllo($cf)
    {
        $pari = [
            '0'=>0,'1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9,
            'A'=>0,'B'=>1,'C'=>2,'D'=>3,'E'=>4,'F'=>5,'G'=>6,'H'=>7,'I'=>8,'J'=>9,
            'K'=>10,'L'=>11,'M'=>12,'N'=>13,'O'=>14,'P'=>15,'Q'=>16,'R'=>17,'S'=>18,'T'=>19,
            'U'=>20,'V'=>21,'W'=>22,'X'=>23,'Y'=>24,'Z'=>25
        ];

        $dispari = [
            '0'=>1,'1'=>0,'2'=>5,'3'=>7,'4'=>9,'5'=>13,'6'=>15,'7'=>17,'8'=>19,'9'=>21,
            'A'=>1,'B'=>0,'C'=>5,'D'=>7,'E'=>9,'F'=>13,'G'=>15,'H'=>17,'I'=>19,'J'=>21,
            'K'=>2,'L'=>4,'M'=>18,'N'=>20,'O'=>11,'P'=>3,'Q'=>6,'R'=>8,'S'=>12,'T'=>14,
            'U'=>16,'V'=>10,'W'=>22,'X'=>25,'Y'=>24,'Z'=>23
        ];

        $somma = 0;
        for ($i = 0; $i < 15; $i++) {
            $carattere = $cf[$i];
            $somma += ($i % 2 === 0) ? $dispari[$carattere] : $pari[$carattere];
        }

        $resto = $somma % 26;
        return chr($resto + ord('A'));
    }
}

