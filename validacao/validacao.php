<?php

class Validacao
{

    public static function validaCampoVazio($dados)
    {
        foreach ($dados as $key => $dado) {

            if (empty($dado)) {
                return false;
            }
            return true;
        }
    }

    public static function validaCaracter($nome, $sobrenome)
    {
        if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", $nome)) {
            return false;
        }
        if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", $sobrenome)) {
            return false;
        }

        return true;
    }

    public static function validaCpf($cpfUser)
    {
        //TIRA A MÁSCARA DO CPF
        $cpfNoMask = preg_replace('/\D/', '', $cpfUser);

        if (strlen($cpfNoMask) != 11) {
            return false;
        }

        $d1 = 0;
        $d2 = 0;

        //VALIDANDO OS DÍGITOS VERIFICADORES DO CPF
        if (preg_match('/(\d)\1{10}/', $cpfNoMask)) {
            return false;
        }

        for ($i = 0, $x = 10; $i < 9; $i++, $x--) {
            $d1 += $cpfNoMask[$i] * $x;
        }

        for ($i = 0, $x = 11; $i < 10; $i++, $x--) {
            $d2 += $cpfNoMask[$i] * $x;
        }

        $tempD1 = (($d1 % 11) < 2) ? 0 : (11 - ($d1 % 11));
        $tempD2 = (($d2 % 11) < 2) ? 0 : (11 - ($d2 % 11));

        if ($tempD1 == $cpfNoMask[9] && $tempD2 == $cpfNoMask[10]) {
            return true;
        }
    }

    public static function validaCelular($telefone)
    {
        $telefone = trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $telefone))))));

        $regTel = '/^\(?\d{2}\)?\s?\d{4}\-?\d{4}$/';
        $regexCel = '/^\(?\d{2}\)?\s?\d{5}\-?\d{4}$/';

        if (preg_match($regexCel, $telefone) || preg_match($regTel, $telefone)) {
            return true;
        } else {
            return false;
        }
    }

    public static function validaEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    public static function validaSenha($senha)
    {
        if (strlen($senha) < 8) {
            return false;
        }
        return true;
    }

    public static function validaCnpj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        if (strlen($cnpj) != 14)
            return false;

        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[13] == ($resto < 2 ? 0 : 11 - $resto)) {
            return true;
        } else {
            return false;
        }
    }

    public static function validaQuantPreco($quantidade)
    {
        if ($quantidade <= 0) {
            return false;
        }
        return true;
    }

    public static function validaDescricao($descricao)
    {
        if (strlen($descricao) > 5) {
            return true;
        } else {
            return false;
        }
    }

}
