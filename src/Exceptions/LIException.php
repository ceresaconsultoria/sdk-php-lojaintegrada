<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace LI\Exceptions;

use Exception;

/**
 * Description of MSException
 *
 * @author weslley
 */
class LIException extends Exception{
    
    public function __construct(Exception $ex) {
        $message = $ex->getMessage() . PHP_EOL . $ex->getTraceAsString();        
        parent::__construct($message, $ex->getCode(), $ex->getPrevious());
    }
    
    public static function fromObjectMessage($message, $code, $previous = null){
        
        if(is_object($message)){
            if($code == 400){
                $body = (string)$message->getResponse()->getBody();
            
                $bodyDecoded = json_decode($body);
                
                if(isset($bodyDecoded->error_response)){
                    return self::process($bodyDecoded->error_response, $code, $previous);
                }
            }
            
            return self::process($message, $code, $previous);
        }
        
        if(is_string($message)){
            
            return self::process($message, $code, $previous);
            
        }
        
    }
    
    private static function process($message, $code, $previous = null){
        if(is_object($message)){
            $newMessageString = [];
            
            if(isset($message->general_errors)){
                foreach($message->general_errors as $error){

                    $newMessageString[] =  $error->message;

                } 
            }                          
            
            if(isset($message->validation_errors)){
                foreach($message->validation_errors as $error){

                    $newMessageString[] =  $error->message_complete;

                }
            }                           
            
            return new LIException( new Exception(implode("\n", $newMessageString), $code, $previous) );     
        }
        
        if(is_string($message)){
            return new LIException( new Exception($message, $code, $previous) );     
        }
    }
    
}
