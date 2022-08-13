<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace LI\Core;

/**
 * Description of MSController
 *
 * @author weslley
 */
class LIController extends LIHttp{
    protected string $apiKey;
    protected string $appKey;
    
    public function __construct(array $config = []) {        
        parent::__construct($config);
    }
    
    public function getAppKey(): string {
        return $this->appKey;
    }

    public function setAppKey(string $appKey) {
        $this->appKey = $appKey;
        return $this;
    }

    public function setApiKey(string $apiKey){
        $this->apiKey = $apiKey;
        return $this;
    }
    
    public function getApiKey(): string{
        return $this->apiKey;
    }
}
