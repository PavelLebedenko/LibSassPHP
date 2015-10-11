<?php
/******************************************************************************/
// Created by: shlomo hassid.
// Copyright 2015, shlomo hassid.
/******************************************************************************/

/*****************************      DEPENDENCE      ***************************/

/******************************************************************************/

/*****************************      DICTIONARY       **************************/

/******************************************************************************/

class SassImp {
    
    private $includePath = "/opt/moresass/";
    private $precisionValue = 5;
    private $parseError = false;
    private $useSyntax = false;
    private $sourceCSS = "";
    private $compiledCSS = "";
    
    
    public function __construct() {

    }
    
    public function source($_preCSS = false) {
        if (!is_string($_preCSS)) {
            return $this->sourceCSS;
        }
        $this->sourceCSS = $_preCSS;
    }
    
    public function compiled($_css = false) {
        if (!is_string($_css)) {
            return $this->compiledCSS;
        }
        $this->compiledCSS = $_css;
    }
    
    public function precision($_per = false) {
        if (is_int($_per) && $_per >= 2 && $_per <= 9) {
            $this->precisionValue = intval($_per);
        }
        return $this->precisionValue;
    }
    
    public function syntax($_syn = false) {
        if (is_bool($_syn)) {
            $this->useSyntax = $_syn;
        }
        return $this->useSyntax;
    }
    
    public function parseSCSS($_cleanDuplicates = false, $_useIncludes = true) {
        $sass = new Sass();
        $source = ($_cleanDuplicates)?$this->cleanDuplicate($this->sourceCSS):$this->sourceCSS;
        $sass->setPrecision($this->precisionValue);
        $sass->setSyntax($this->useSyntax);
        try {
            if ($_useIncludes) { 
                $sass->setIncludePath("/opt/moresass/");
            }
            $css = $sass->compile($source);
            
        } catch (Exception $e) {
            $this->_setError($e->getMessage());
            return false;
        }
        $this->compiled($css);
        return true;
    }

    public function cleanDuplicate() {
        
    }
    
    private function _setError($_mes = "") {
        $this->parseError = array(
            "syntax"  => $this->useSyntax,
            "message" => (is_string($_mes))?$_mes:"unknown"
        );
    }
    
    public function includePath($_path = false) {
        if (is_string($_path)) {
            return $this->includePath = $_path;
        }
        return $this->includePath;
    }
    
    public function getLastError() {
        if ($this->parseError) {
            return $this->parseError;
        } 
        return null;
    }
}