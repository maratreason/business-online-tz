<?php

namespace app\models;

class Words {
    private $words;

    /**
     * Функция получения всех слов из строки, которые больше указанного значения $minrepeat.
     * @param $str - входящая строка.
     * @param $minRepeat - количество повторений одинаковых слов.
     * @return $result - ассоциативный массив с словами и количеством повторений.
     */
    function getWordCount($str, $minRepeat) {
        $wordCount = [];
        $result = [];
        $resultStr = $this->replaceSymbols(['.', ':', ',', '(', ')', '-'], $str);
        $this->words = explode(' ', $resultStr);
        $this->words = preg_replace('#/[^A-zА-я\.,]/#', '', $this->words);
    
        foreach ($this->words as $word) {
            $word = preg_replace("#/[^A-zА-я]/#", "", $word);
            $wordCount[$word] += 1;
            $wordCount[$word] >= $minRepeat && $word !== '' ? $result[$word] = $wordCount[$word] : null;
        }
        return $result;
    }

    /**
     * Функция удаление символов из строки
     * @param $symbols - массив символов. 
     * @param $words - строка. 
     * @return $resultArr - строка без символов, указанных в $symbols.
     */
    function replaceSymbols($symbols = [], $words) {
        $result = $words;
        foreach($symbols as $symbol) {
            $result = rtrim($result);
            $result = str_replace($symbol, '', $result);
            $result = str_replace('  ', ' ', $result);
        }
        return $result;
    }
}
